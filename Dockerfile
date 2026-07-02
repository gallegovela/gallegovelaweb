FROM composer:2 AS composer_build
WORKDIR /app
COPY composer.json composer.lock* ./
COPY wp-content/ ./wp-content/
RUN composer install --no-dev --no-interaction --optimize-autoloader

FROM wordpress:php8.3-apache

# wp-content combina lo propio (theme/plugin gallegovela) con lo instalado por Composer (plugins de WPackagist)
COPY --from=composer_build /app/wp-content/ /var/www/html/wp-content/

# Sube el límite de subida de ficheros (Media Library) por defecto de PHP.
COPY docker/php/uploads.ini /usr/local/etc/php/conf.d/uploads.ini
