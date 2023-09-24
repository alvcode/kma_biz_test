Тестовое задание

Развернуть контейнеры
~~~
docker compose up -d
~~~

Войти в контейнер приложения
~~~
docker exec -it app /bin/bash
~~~

Установить пакеты через composer
~~~
composer install
~~~

Накатить миграцию, запустить публикацию в rabbitMQ и запустить supervisor
~~~
php console migrate
php console publish
service supervisor start
~~~

Через 100 секунд открыть проект по корневому хосту в браузере