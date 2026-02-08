FROM php:8.2-fpm-bookworm

RUN apt-get update && apt-get install -y --no-install-recommends \
    libzip-dev \
    libpng-dev \
    libxml2-dev \
    libonig-dev \
    unzip \
    && docker-php-ext-install pdo_mysql mbstring zip opcache \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

COPY --chown=www-data:www-data . .

RUN composer install --no-dev --no-scripts --optimize-autoloader --no-interaction \
    && composer run-script post-autoload-dump --no-interaction || true

RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache
