FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      python3 \
      supervisor \
      git && \
      docker-php-ext-install mysqli pdo pdo_mysql sockets && \
      docker-php-ext-enable pdo_mysql && \
      apt-get clean && \
      rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./_docker/app/supervisor_my.conf /etc/supervisor/conf.d/supervisor_my.conf
COPY . /var/www
COPY ./_docker/app/engage_script.sh /usr/local/bin/
RUN chmod +x /usr/local/bin/engage_script.sh

# Install composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

WORKDIR /var/www

ADD https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh /usr/local/bin/wait-for-it
RUN chmod +x /usr/local/bin/wait-for-it

# Запускаем скрипт при запуске контейнера
CMD ["/usr/local/bin/engage_script.sh"]