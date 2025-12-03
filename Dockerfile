FROM php:8.2-apache

# Install system deps
RUN apt-get update && apt-get install -y \
    git unzip libpq-dev libzip-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Enable Apache mods
RUN a2enmod rewrite
RUN a2enmod headers

# Apache vhost
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP deps
RUN composer install --optimize-autoloader --no-dev --no-interaction

# Fix Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Laravel optimize
RUN php artisan config:clear || true
RUN php artisan cache:clear || true
RUN php artisan route:clear || true
RUN php artisan view:clear || true

RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

# Storage symlink
RUN php artisan storage:link || true

EXPOSE 80

CMD ["apache2-foreground"]
