FROM php:7.4-fpm

# Copy composer.lock and composer.json
COPY composer.lock composer.json

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl\
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install mysqli pdo pdo_mysql
RUN apt-get update -y && apt-get upgrade -y;
RUN apt-get install -y libxml2-dev
RUN apt-get install -y libzip-dev
RUN docker-php-ext-install -j$(nproc) xmlrpc
RUN docker-php-ext-install gd

RUN pecl install -o -f zip \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable zip
#install redis
RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis
#install mongo
RUN pecl install -o -f mongodb \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable mongodb

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
