# ---------- Stage 1: build frontend assets ----------
FROM node:22-alpine AS assets
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN rm -f public/hot \
    && npm run build \
    && ls -la public/build \
    && test -f public/build/manifest.json || (echo "❌ manifest.json missing!" && exit 1)

# ---------- Stage 2: PHP runtime ----------
FROM php:8.3-apache

# Install system deps + PHP extensions
RUN apt-get update && apt-get install -y \
        git unzip libzip-dev libpq-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip mbstring opcache \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

# Silence the ServerName warning (cosmetic, but cleans logs)
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

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

# Copy the rest of the app, EXCLUDING public/build and public/hot
# (We'll copy the real build output from Stage 1 next)
COPY . .
RUN rm -rf public/build public/hot

# Copy built frontend assets from Stage 1 (this is now the ONLY source of truth)
COPY --from=assets /app/public/build ./public/build

# Sanity check — fail the build if the manifest isn't there
RUN test -f public/build/manifest.json \
    || (echo "❌ public/build/manifest.json missing — check Vite config" && exit 1)

# Run Laravel's autoload scripts now that the full app is present
RUN composer dump-autoload --optimize \
    && chown -R www-data:www-data storage bootstrap/cache public/build \
    && chmod -R 775 storage bootstrap/cache

# Render injects $PORT at runtime — make Apache listen on it
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 10000

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]