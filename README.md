Тестовое задание.
Чтобы запуститшь приложение:

1. Клонируем репозиторий
2. Создаем .env файл из примера (подключаем mailtrap, gmail что удобно)
3. Билдим и запускаем докер контейнеры в корневой папке
```     
docker-compose build
docker-compose up -d
```
4. Заходим внутрь контейнера
```
docker exec -it laravel /bin/bash
```
5. Запускаем внутри контейнера следующие команды
```
composer install
php artisan migrate

```
7. Генерирование случайного числа подступно по адресу (метод POST)
```
http://127.0.0.1:8080/api/v1/numbers
```
8. Получение числа по id доступно по адресу (метод GET)
```
http://127.0.0.1:8080/api/v1/numbers/{id}
```
9. Или можно использовать команды
```
php artisan number:generate
php artisan number:get {id}
```
10. Список всех сгенерированных чисел за сегодняшний день записывается в txt файл /public/daily_report/<filename>, 
а также отправлется на электронную почту admin@admin.admin раз в сутки по заданному расписанию в app/Console/Kernel.php (метод schedule).
