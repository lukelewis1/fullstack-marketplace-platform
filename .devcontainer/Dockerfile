FROM mcr.microsoft.com/devcontainers/php:0-8.2

RUN apt-get update && apt-get install -y \
    git \
    sudo \
    default-mysql-client \
    apache2 \
    libapache2-mod-php \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql && docker-php-ext-enable pdo_mysql

COPY ./apache-config.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80

CMD ["apache2ctl", "-D", "FOREGROUND"]
