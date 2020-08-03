# Base
FROM php:7.4.8-fpm-buster AS base
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    locales \
    zip \
    unzip \
    curl \
    libonig-dev
RUN docker-php-ext-install pdo_mysql mbstring zip
RUN pecl install redis
RUN docker-php-ext-enable redis
COPY .docker/php/php.ini /usr/local/etc/php/conf.d/php.ini


# Base with composer
FROM base AS base-with-composer
RUN apt-get update && apt-get install -y git
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Base with composer and xdebug
FROM base-with-composer AS base-with-composer-and-xdebug
RUN pecl install xdebug
RUN docker-php-ext-enable xdebug
COPY .docker/php/xdebug-configuration.ini /usr/local/etc/php/conf.d/xdebug-configuration.ini


# Dev environment
FROM base-with-composer-and-xdebug AS dev
ARG USER_ID
ARG GROUP_ID
USER $USER_ID:$GROUP_ID
