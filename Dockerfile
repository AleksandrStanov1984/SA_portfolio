FROM php:8.2-apache

# -------------------------
# Устанавливаем системные пакеты
# -------------------------
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    nano \
    && docker-php-ext-install pdo pdo_pgsql zip

# -------------------------
# Включаем Apache mod_rewrite
# -------------------------
RUN a2enmod rewrite

# -------------------------
# Устанавливаем Composer
# -------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# -------------------------
# Копируем проект в контейнер
# -------------------------
COPY . /var/www/html

# -------------------------
# Устанавливаем зависимости
# -------------------------
WORKDIR /var/www/html
RUN composer install --no-dev --optimize-autoloader

# -------------------------
# Права
# -------------------------
RUN chown -R www-data:www-data /var/www/html/storage \
    && chown -R www-data:www-data /var/www/html/bootstrap/cache

# -------------------------
# Оптимизация Laravel
# -------------------------
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

EXPOSE 80
CMD ["apache2-foreground"]
