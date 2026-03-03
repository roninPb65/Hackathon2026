#!/bin/bash
set -e

# Run Laravel setup if APP_KEY is not set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Cache config for production
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run migrations automatically on startup
php artisan migrate --force

# Start PHP-FPM in background
php-fpm -D

# Start Nginx in foreground
nginx -g "daemon off;"
