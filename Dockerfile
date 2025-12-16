FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip \
    libzip-dev libpng-dev libonig-dev libxml2-dev \
    sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite zip mbstring exif pcntl bcmath

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

RUN mkdir -p database && touch database/database.sqlite

RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

RUN chmod -R 775 storage bootstrap/cache database

EXPOSE 80
CMD php artisan serve --host=0.0.0.0 --port=80
