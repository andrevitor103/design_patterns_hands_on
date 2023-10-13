FROM php:8.2-fpm

WORKDIR /app

RUN apt-get update

RUN apt-get install -y zip

RUN docker-php-ext-enable mongodb

COPY . .

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
