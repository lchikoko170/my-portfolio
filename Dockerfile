# ---------- Stage 1: build frontend assets ----------
FROM node:22-alpine AS assets
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# ---------- Stage 2: PHP runtime ----------
FROM php:8.3-apache

# Install system deps + PHP extensions (pdo_mysql + pdo_pgsql so either DB works)
RUN apt-get update && apt-get install -y \
        git unzip libzip-dev libpq-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip mbstring opcache \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Point Apache's DocumentRoot at Laravel's /public
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' \
        /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Install PHP deps first (better layer caching)
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction \
        --no-scripts --prefer-dist

# Copy the rest of the app
COPY . .

# Copy built frontend assets from Stage 1
COPY --from=assets /app/public/build ./public/build

# Run Laravel's autoload scripts now that the full app is present
RUN composer dump-autoload --optimize \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Render injects $PORT at runtime — make Apache listen on it
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 10000

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]