# syntax=docker/dockerfile:1

FROM composer:lts AS prod-deps

WORKDIR /app
RUN --mount=type=bind,source=./composer.json,target=composer.json \
    --mount=type=bind,source=./composer.lock,target=composer.lock \
    --mount=type=cache,target=/tmp/cache \
    composer install --no-dev --no-interaction

FROM php:8.2-apache AS base
RUN docker-php-ext-install pdo pdo_mysql
COPY ./src /var/www/html

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN sed -i 's/Listen 80/Listen 9000/' /etc/apache2/ports.conf
RUN sed -i 's/:80/:9000/' /etc/apache2/sites-available/000-default.conf

FROM base AS final
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
COPY --from=prod-deps app/vendor/ /var/www/html/vendor

EXPOSE 9000

USER www-data