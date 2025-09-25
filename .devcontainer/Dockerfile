FROM php:8.2.20-apache

RUN apt-get update && apt-get install -y \
    git \
    sudo \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable mysqli pdo_mysql

COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80
