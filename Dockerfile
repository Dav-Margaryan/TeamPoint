FROM php:8.2-apache

RUN a2enmod rewrite

RUN sed -i 's/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

COPY . /var/www/html/

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

RUN docker-php-ext-install pdo_mysql

RUN ls -R /var/www/html
