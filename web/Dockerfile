FROM php:7-apache

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash - \
    && apt-get update && apt-get install -y \
    patch unzip nodejs \
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

WORKDIR /opt/app
COPY ./package*.json ./
RUN npm install --prod

# Create symlink for public server root
RUN mkdir -p ./theme \
    && ln -sf /opt/app/theme /var/www/html/bl-themes/heirloom-earth \
    && chown -RL www-data:www-data /var/www/html

# Copy source
COPY ./ /opt/app/

# Build assets and patch Bludit
RUN npm run build \
    && cd /opt/app/patches \
    && patch /var/www/html/bl-kernel/boot/variables.php ./symlinks.patch
