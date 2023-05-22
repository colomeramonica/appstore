FROM ubuntu:22.04
ENV DEBIAN_FRONTEND noninteractive
LABEL maintainer="colomeramonica@gmail.com"
RUN  apt-get -y update && apt-get install -y software-properties-common curl apt-transport-https git vim supervisor bzip2

## Instalação do PHP
RUN apt-get update && \
    apt-get install -y php8.1 \
    php8.1-curl \
    php8.1-intl \
    php8.1-gd \
    php8.1-mbstring \
    php8.1-common \
    php8.1-imap \
    php8.1-xml \
    php8.1-mysql \
    php8.1-zip \
    php8.1-fpm \
    php-igbinary \
    php-msgpack \
    php8.1-bz2 \
    php8.1-pdo \
    php8.1-phpdbg && \
    mkdir -p /var/log/php-fpm && \
    mkdir -p /var/run/php

## Configuração do php
RUN sed -i "s|;*daemonize\s*=\s*yes|daemonize = no|g" /etc/php/8.1/fpm/php-fpm.conf && \
    sed -i "s|;*listen\s*=\s*\/run\/php\/php8.1-fpm.sock|listen = 127.0.0.1:9000|g" /etc/php/8.1/fpm/pool.d/www.conf && \
    sed -i "s|;*date.timezone =.*|date.timezone = "America/Sao_Paulo"|i" /etc/php/8.1/fpm/php.ini && \
    sed -i "s|;*memory_limit =.*|memory_limit = 512M|i" /etc/php/8.1/fpm/php.ini && \
    sed -i "s|;*upload_max_filesize =.*|upload_max_filesize = 8M|i" /etc/php/8.1/fpm/php.ini && \
    sed -i "s|;*max_file_uploads =.*|max_file_uploads = 40|i" /etc/php/8.1/fpm/php.ini && \
    sed -i "s|;*post_max_size =.*|post_max_size = 10M|i" /etc/php/8.1/fpm/php.ini && \
    sed -i "s|;*cgi.fix_pathinfo=.*|cgi.fix_pathinfo= 0|i" /etc/php/8.1/fpm/php.ini

## Instalação nginx
RUN apt-get install -y nginx

## Instalação Composer
RUN curl -sS https://getcomposer.org/installer | php  -- --install-dir=/bin --version=1.10.10 && \
    cp /bin/composer.phar /bin/composer

## Instalação node
RUN curl https://nodejs.org/download/release/v8.16.1/node-v8.16.1-linux-x64.tar.gz -o node.gz && \
    tar -C /usr/local --strip-components 1 -xzf node.gz && \
    rm node.gz

##Instalação do yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
    apt-get update && apt-get install -y yarn=1.17.*

# Atalhos
RUN echo "alias cache-clear=\"php artisan cache:clear && php artisan config:clear && php artisan twig:clean\"" >> ~/.bashrc


EXPOSE 80
CMD ["/usr/sbin/nginx", "-g", "daemon off;"]
