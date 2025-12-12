FROM php:8.2-apache

# Enable Apache Rewrite
RUN a2enmod rewrite

# Copy project
COPY . /var/www/html/

# Set working dir
WORKDIR /var/www/html/

# Permissions
RUN chown -R www-data:www-data /var/www/html
RUN docker-php-ext-install pdo pdo_mysql


