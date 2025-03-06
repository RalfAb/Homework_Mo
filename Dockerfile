FROM php:8.1-apache

# Install necessary extensions and dependencies
RUN apt-get update && apt-get install -y \
    zip \
    unzip \
    git \
    libzip-dev \
    && docker-php-ext-install zip pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy application files (assuming your Codeception tests and API are in the 'app' directory)
COPY . /app/

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Expose port 80 (Apache)
EXPOSE 80

#

# Start Apache
CMD ["apache2-foreground"]