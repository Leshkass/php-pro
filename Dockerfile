FROM php:8.3
WORKDIR /home/php-pro

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

RUN docker-php-ext-install \
    pdo_mysql \
    opcache

ENV COMPOSER_ALLOW_SUPERUSER=1
ARG COMPOSER_VERSION=2.7.2
RUN curl -sS https://getcomposer.org/installer | php -- \
        --filename=composer \
        --install-dir=/usr/local/bin \
        --version=${COMPOSER_VERSION} \
    && composer clear-cache

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug