#!/usr/bin/env bash
set -e

# Render gives us $PORT at runtime (default 10000)
PORT="${PORT:-10000}"

# Rewrite Apache to listen on the correct port
sed -i "s/Listen 80/Listen ${PORT}/" /etc/apache2/ports.conf
sed -i "s/:80/:${PORT}/g" /etc/apache2/sites-available/000-default.conf

# Laravel runtime caches (env vars are only available now)
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations on deploy (safe: --force is required in production)
# Uncomment if you want auto-migrations:
# php artisan migrate --force

# Hand off to Apache
exec "$@"