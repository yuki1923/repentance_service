FROM php:7.4-fpm

# composerをインストール
COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

# npmインストール
COPY --from=node:10.22 /usr/local/bin /usr/local/bin
COPY --from=node:10.22 /usr/local/lib /usr/local/lib

COPY php.ini /usr/local/etc/php/php.ini

RUN apt-get update \
  && apt-get install -y \
  git \
  zip \
  unzip \
  && docker-php-ext-install pdo_mysql bcmath

WORKDIR /var/www/html
