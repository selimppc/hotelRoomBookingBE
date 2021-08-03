#FROM php:8.0-fpm
FROM php:8.0-fpm-buster

RUN apt-get update && apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip libpq-dev librabbitmq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install intl opcache pdo pdo_mysql pdo_pgsql pgsql \
    && pecl install apcu \
    && pecl install mongodb \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/project

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

RUN echo "extension=mongodb.so" >> /etc/php.ini
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini

## MEMORY
RUN cd /usr/local/etc/php/conf.d/ && \
  echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-ram-limit.ini

RUN apt-get install -y nodejs npm build-essential
CMD npm install @symfony/webpack-encore --save-dev

