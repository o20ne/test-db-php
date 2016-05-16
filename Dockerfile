FROM php:5.6-apache

RUN apt-get update && apt-get install -y libpq-dev git php5-pgsql
RUN docker-php-ext-install pdo_mysql pdo_pgsql mbstring zip


COPY config/php.ini /usr/local/etc/php/
COPY src/ /var/www/html/

EXPOSE 80