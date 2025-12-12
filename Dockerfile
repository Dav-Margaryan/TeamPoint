FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql
RUN a2enmod rewrite

# Copy only TeamPoint folder into DocumentRoot
COPY TeamPoint/ /var/www/html/

WORKDIR /var/www/html/

RUN chown -R www-data:www-data /var/www/html
