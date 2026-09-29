# ============================================
# Dockerfile - MI Nurul Ummah (CodeIgniter 3)
# PHP 7.4 + Apache (tanpa MySQL, MySQL terpisah)
# ============================================

FROM php:7.4-apache

# Install ekstensi PHP yang dibutuhkan
RUN docker-php-ext-install mysqli pdo pdo_mysql \
    && a2enmod rewrite

# Fix Debian Bullseye EOL - pindahkan ke archive repository
RUN sed -i 's|deb.debian.org/debian-security|archive.debian.org/debian-security|g' /etc/apt/sources.list \
    && sed -i 's|deb.debian.org/debian |archive.debian.org/debian |g' /etc/apt/sources.list \
    && sed -i '/bullseye-updates/d' /etc/apt/sources.list \
    && apt-get -o Acquire::Check-Valid-Until=false update

# Install GD library (untuk upload/manipulasi gambar)
RUN apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Set DocumentRoot ke /var/www/html
ENV APACHE_DOCUMENT_ROOT=/var/www/html

# Konfigurasi Apache agar AllowOverride All (supaya .htaccess berfungsi)
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Konfigurasi PHP upload
RUN echo "upload_max_filesize = 20M" > /usr/local/etc/php/conf.d/uploads.ini \
    && echo "post_max_size = 25M" >> /usr/local/etc/php/conf.d/uploads.ini \
    && echo "max_execution_time = 300" >> /usr/local/etc/php/conf.d/uploads.ini

# Copy semua source code ke container
COPY . /var/www/html/

# Set permission untuk folder upload dan cache
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/ \
    && chmod -R 775 /var/www/html/upload \
    && chmod -R 775 /var/www/html/application/cache \
    && chmod -R 775 /var/www/html/application/logs

EXPOSE 80

CMD ["apache2-foreground"]
