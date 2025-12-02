# --------------------------
# 1) BASE PHP IMAGE
# --------------------------
FROM php:8.2-apache

# --------------------------
# 2) INSTALL SYSTEM PACKAGES
# --------------------------
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libonig-dev \
    libpng-dev \
    libzip-dev \
    curl \
    && docker-php-ext-install pdo pdo_mysql zip

# --------------------------
# 3) ENABLE APACHE MODS
# --------------------------
RUN a2enmod rewrite

# --------------------------
# 4) COPY PROJECT
# --------------------------
WORKDIR /var/www/html
COPY . .

# --------------------------
# 5) INSTALL COMPOSER
# --------------------------
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# --------------------------
# 6) INSTALL PHP DEPENDENCIES
# --------------------------
RUN composer install --no-dev --optimize-autoloader

# --------------------------
# 7) SET PERMISSIONS
# --------------------------
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# --------------------------
# 8) EXPOSE PORT
# --------------------------
EXPOSE 80

# --------------------------
# 9) START APACHE
# --------------------------
CMD ["apache2-foreground"]
