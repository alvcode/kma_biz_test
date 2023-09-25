#!/bin/bash

cd /var/www

# # Ожидаем доступности MariaDB
/usr/local/bin/wait-for-it mariadb:3306 --timeout=60 -- echo "mariadb is up"

# # Ожидаем доступности RabbitMQ
/usr/local/bin/wait-for-it rabbitmq:5672 --timeout=60 -- echo "rabbitmq is up"

# устанавливаем зависимости
composer install

# делаем миграцию, создаем таблицу
php console migrate

# Запускаем очередь
php console publish

service supervisor start

exit 0