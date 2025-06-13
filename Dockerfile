FROM php:8.2-fpm

ARG user=admin
ARG uid=1000
ARG WORKDIR=/var/www
ENV DOCUMENT_ROOT=${WORKDIR}
ENV LARAVEL_PROCS_NUMBER=1

# Install system dependencies
RUN apt-get update && apt-get install -y --fix-missing \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    libssl-dev \
    libmagickwand-dev \
    libgd-dev \
    openssh-server \
    nano \
    cron

# Clean up
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_pgsql pgsql mbstring exif pcntl bcmath sockets gd pdo_mysql && \
    pecl install -o -f redis imagick && \
    docker-php-ext-enable redis imagick

# Install PHP Opcache extention
RUN docker-php-ext-install opcache

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user && \
    mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

# Copy custom configurations PHP
COPY docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini
COPY docker/php/opcache.ini $PHP_INI_DIR/conf.d/opcache.ini

# Set the Docker user to the user we just created
USER $user

EXPOSE 9000

CMD [ "php-fpm" ]
