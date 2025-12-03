FROM php:8.2-apache

# Системные зависимости
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libssl-dev \
    libicu-dev \
    libcurl4-openssl-dev \
    pkg-config

# PHP extensions
RUN docker-php-ext-install \
        pdo \
        pdo_pgsql \
        mbstring \
        intl \
        zip

# Включаем mod_rewrite
RUN a2enmod rewrite

# Конфигурация виртуального хоста
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Устанавливаем Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Копируем приложение
COPY . .

# Чистая установка зависимостей
RUN composer install --no-dev --optimize-autoloader

# Линки
RUN php artisan storage:link || true

# Права
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 storage bootstrap/cache

