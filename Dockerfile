FROM php:8.2-apache

# HARD RESET Apache MPMs (THIS IS THE FIX)
RUN rm -f /etc/apache2/mods-enabled/mpm_*.load \
    && rm -f /etc/apache2/mods-enabled/mpm_*.conf \
    && a2enmod mpm_prefork

# Enable rewrite
RUN a2enmod rewrite

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

# Copy full Laravel project
COPY . .

# Install dependencies
RUN composer install \
    --no-dev \
    --no-interaction \
    --prefer-dist \
    --optimize-autoloader

# Permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Laravel safe command
RUN php artisan storage:link || true

EXPOSE 80
CMD ["apache2-foreground"]
