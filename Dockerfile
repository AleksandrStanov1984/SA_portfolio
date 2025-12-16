FROM php:8.2-cli

# System deps
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    sqlite3 \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite zip mbstring exif pcntl bcmath

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project
COPY . .

# SQLite database
RUN mkdir -p database \
    && touch database/database.sqlite

# Install deps
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# Permissions
RUN chmod -R 775 storage bootstrap/cache database

EXPOSE 80

# Run migrations + start server
CMD php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=80
