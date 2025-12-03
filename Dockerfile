# ============================================================
# 1) BASE IMAGE (php + apache)
# ============================================================
FROM php:8.2-apache

# Ускоряем apt
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Apache rewrite
RUN a2enmod rewrite

# ============================================================
# 2) COMPOSER
# ============================================================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ============================================================
# 3) WORKDIR
# ============================================================
WORKDIR /var/www/html

# ============================================================
# 4) COPY only composer first (Docker cache)
# ============================================================
COPY composer.json composer.lock ./

# ============================================================
# 5) Install vendor dependencies (cached layer!)
# ============================================================
RUN composer install --no-dev --optimize-autoloader --no-interaction

# ============================================================
# 6) Now copy full application
# ============================================================
COPY . .

# ============================================================
# 7) Laravel optimization (BUILD-TIME!)
# ============================================================
RUN php artisan storage:link --quiet || true \
    && php artisan config:cache --quiet \
    && php artisan route:cache --quiet \
    && php artisan view:cache --quiet

# ============================================================
# 8) Rights (Apache user)
# ============================================================
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# ============================================================
# 9) Expose port
# ============================================================
EXPOSE 80

# ============================================================
# 10) Start Apache
# ============================================================
CMD ["apache2-foreground"]
