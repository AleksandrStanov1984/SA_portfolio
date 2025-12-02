# --------------------------
# 1) BASE PHP IMAGE
# --------------------------
FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git zip unzip libonig-dev libpng-dev libzip-dev curl \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql zip

RUN a2enmod rewrite
WORKDIR /var/www/html
COPY . .

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Laravel production build
RUN php artisan config:clear
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan optimize

EXPOSE 80
CMD ["apache2-foreground"]
