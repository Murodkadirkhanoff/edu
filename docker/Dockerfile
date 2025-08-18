FROM php:8.4-fpm

RUN usermod -u 1000 www-data

RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libzip-dev ffmpeg \
    && docker-php-ext-install pdo pdo_pgsql zip

COPY docker/php.ini /usr/local/etc/php/conf.d/custom.ini

RUN curl -fsSL https://deb.nodesource.com/setup_24.x | bash - \
    && apt-get install -y nodejs && npm install -g npm \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

WORKDIR /var/www/html

# Только если не используешь volume
# COPY . .

RUN mkdir -p storage bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache
