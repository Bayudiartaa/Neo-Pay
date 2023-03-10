FROM php:7.4-fpm
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxml2-dev  \
    zip \
    unzip \
    curl 

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-configure gd
RUN docker-php-ext-enable sodium
RUN docker-php-ext-install gd
RUN docker-php-ext-install pdo pdo_pgsql pgsql