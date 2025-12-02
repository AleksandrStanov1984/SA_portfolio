FROM php:8.2-apache

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpq-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring tokenizer xml

# Включаем mod_rewrite
RUN a2enmod rewrite

# Настройки Apache
COPY ./docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Устанавливаем Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Копируем проект
COPY . /var/www/html

WORKDIR /var/www/html

# Установка зависимостей Laravel
RUN composer install --no-dev --optimize-autoloader

# Генерация кешей
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Права на storage
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
