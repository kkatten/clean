#!/bin/sh
set -e
# Ждём готовности MySQL (на слабых/сетевых тачках БД поднимается дольше)
php /var/www/docker/wait-for-db.php

if [ ! -f /var/www/vendor/autoload.php ]; then
    composer install --no-scripts --no-interaction
fi
if [ ! -f /var/www/.env ]; then
    cp /var/www/.env.example /var/www/.env
    php artisan key:generate --ansi
fi
php artisan package:discover --ansi || true
php artisan migrate --force --no-interaction || true
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache 2>/dev/null || true
exec php-fpm
