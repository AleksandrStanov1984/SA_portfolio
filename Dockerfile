FROM php:8.2-apache

# Устанавливаем системные пакеты
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
    pkg-config \
    && docker-php-ext-install \
        pdo \
        pdo_pgsql \
        mbstring \
        intl \
        zip

# Включаем mod_rewrite
RUN a2enmod rewrite

# Настраиваем виртуальный хост
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Устанавливаем Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Копируем файлы приложения
COPY . .

# Удаляем старые и собираем новые зависимости
RUN composer install --no-dev --optimize-autoloader

RUN php artisan storage:link

# Настраиваем права
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

RUN chmod -R 775 storage bootstrap/cache

RUN php artisan migrate --force


