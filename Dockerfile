FROM php:8.2-apache

# Системные пакеты
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip

# Включаем mod_rewrite
RUN a2enmod rewrite

# Настройка Apache VirtualHost
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Установка Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Копируем проект
COPY . .

# Установка зависимостей Laravel
RUN composer install --no-dev --optimize-autoloader

# Laravel optimize
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan route:clear
RUN php artisan view:clear

RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

# Storage link
RUN php artisan storage:link || true

# Права на storage и bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
