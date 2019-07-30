FROM php:7-apache

RUN apt-get update && apt-get install -y \
    patch unzip \
    libzip-dev libpng-dev libfreetype6-dev libjpeg62-turbo-dev

# Enable PHP and Apache modules
RUN docker-php-ext-configure gd \
    --with-freetype-dir=/usr/include/ \
    --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd exif zip \
    && a2enmod rewrite

# Install Bludit
WORKDIR /tmp
RUN curl -L -o bludit.zip https://github.com/bludit/bludit/archive/2.3.4.zip \
    && unzip -q bludit.zip && rm -rf /var/www/html && mv bludit-* /var/www/html \
    && rm -f bludit.zip

# Create symlink for public server root
WORKDIR /opt/app
RUN mkdir -p ./theme \
    && ln -sf /opt/app/theme /var/www/html/bl-themes/heirloom-earth \
    && chown -R www-data:www-data /var/www/html

# Copy source
COPY ./ /opt/app/

# Patch Bludit
RUN cd /opt/app/patches \
    && patch /var/www/html/bl-kernel/boot/variables.php ./symlinks.patch
