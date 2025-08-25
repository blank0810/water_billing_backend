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
    npm \
    shadow   # <-- needed for usermod/groupmod

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

# --- UID/GID mapping ---
# Pass your host UID/GID at build time (defaults to 1000:1000 if not provided)
ARG UID=1000
ARG GID=1000

# Update www-data user/group to match host
RUN groupmod -g ${GID} www-data \
    && usermod -u ${UID} -g www-data www-data \
    && mkdir -p /var/www/html \
    && chown -R www-data:www-data /var/www/html

# Switch to non-root user
USER www-data
