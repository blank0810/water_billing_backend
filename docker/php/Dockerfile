FROM php:8.2-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    unzip \
    curl \
    icu-dev \
    libzip-dev \
    zlib-dev \
    oniguruma-dev \
    libpng-dev \
    jpeg-dev \
    freetype-dev \
    mysql-client \
    nodejs \
    npm

# PHP Extensions
RUN docker-php-ext-install \
    pdo_mysql \
    intl \
    zip \
    bcmath \
    mbstring \
    exif \
    pcntl \
    opcache

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html
