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

# Включаем модуль Apache
RUN a2enmod rewrite

# Конфиг Apache
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Установка Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Копируем проект
COPY . .

# Установка зависимостей Laravel
RUN composer install --no-dev --optimize-autoloader

# Создаём storage link заранее
RUN php artisan storage:link || true

# Права на storage & cache — ДОЛЖНЫ выполняться до optimize
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Laravel optimize (без clear!)
RUN php artisan config:cache || true \
    && php artisan route:cache || true \
    && php artisan view:cache || true

EXPOSE 80

CMD ["apache2-foreground"]
