# Stage 1: PHP Application
FROM php:8.1-fpm
WORKDIR /app

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    npm \
    && docker-php-ext-install pdo_mysql

# Copy only composer files
COPY composer.json /app/
COPY composer.lock /app/

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Adjust permissions of the application directory
RUN chown -R www:www /app

# Switch to www user
USER www

# Install composer dependencies
RUN composer install --ignore-platform-reqs --no-scripts --no-autoloader

# Stage 2: Node.js
FROM node:14 as node
WORKDIR /app

# Copy the rest of the application files
COPY . .

# Install npm dependencies
RUN npm install --no-optional --no-progress --no-save

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
