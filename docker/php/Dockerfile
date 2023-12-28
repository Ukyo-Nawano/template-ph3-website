FROM php:8.2-fpm-alpine3.17

# 必要なパッケージをインストール
RUN apk add --no-cache \
  libzip-dev \
  zlib-dev \
  mariadb-client \
  unzip \
  curl \
  vim \
  && docker-php-ext-install zip pdo_mysql sockets \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# PHPの設定ファイルをコピー
COPY php.ini /usr/local/etc/php/conf.d/custom.ini

# ワーキングディレクトリを設定
WORKDIR /work/web