FROM php:8.2-fpm-alpine

RUN apk update && apk add --no-cache \
    git \
    zip \
    unzip \
    libzip-dev \
    oniguruma-dev

RUN docker-php-ext-install pdo pdo_mysql zip mbstring curl

WORKDIR /var/www/html

COPY . /var/www/html

RUN adduser -D user
USER user

EXPOSE 9000

CMD ["php-fpm"]