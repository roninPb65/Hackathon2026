#!/bin/bash
set -e

# Clear any cached config first so env vars are always fresh
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Generate app key only if not already set
if [ -z "$APP_KEY" ]; then
    php artisan key:generate --force
fi

# Rebuild cache with current env
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Wait for DB to be ready then migrate
echo "Waiting for database connection..."
for i in {1..30}; do
    php artisan migrate --force && break
    echo "DB not ready yet, retrying in 3s... ($i/30)"
    sleep 3
done

# Start PHP-FPM in background
php-fpm -D

# Start Nginx in foreground
nginx -g "daemon off;"
