# ============================================
# Dockerfile - MI Nurul Ummah (CodeIgniter 3)
# PHP 8.0 + Nginx + PHP-FPM (Alpine)
# ============================================

FROM php:8.0-fpm-alpine

# Install system dependencies
RUN apk add --no-cache \
    nginx \
    curl \
    bash \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    oniguruma-dev \
    libzip-dev \
    zip \
    unzip

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        mysqli \
        pdo \
        pdo_mysql \
        mbstring \
        gd \
        zip

# Konfigurasi PHP upload
RUN echo "upload_max_filesize = 20M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 25M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_execution_time = 300" >> /usr/local/etc/php/conf.d/uploads.ini

# Set working directory
WORKDIR /var/www/html

# Copy semua source code ke container
COPY . .

# Copy nginx config
COPY nginx.conf /etc/nginx/nginx.conf
COPY default.conf /etc/nginx/conf.d/default.conf

# Set permission untuk folder upload dan cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html \
    && chmod -R 775 /var/www/html/upload \
    && chmod -R 775 /var/www/html/application/cache \
    && chmod -R 775 /var/www/html/application/logs

# Buat direktori yang dibutuhkan nginx
RUN mkdir -p /run/nginx

EXPOSE 80

# Start nginx + php-fpm
CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]
