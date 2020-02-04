
# Pull base image
FROM php:7.4.2-fpm

# Install common tools
RUN apt-get update && apt-get install -y apt-transport-https
RUN apt-get install -y wget curl nano htop git unzip nginx vim bzip2 software-properties-common cron libpq-dev
RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-configure zip\
  && docker-php-ext-install zip pdo pdo_pgsql pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ADD ./ /var/www/testik
WORKDIR /var/www/testik

# EXPOSE 8080
CMD php-fpm -F -R

