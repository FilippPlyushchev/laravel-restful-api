## Установка
Инструкция для запуска приложения.

### Клонирование
В первую очередь нужно клонировать проект к себе на компьютер
```
git clone https://github.com/FilippPlyushchev/laravel-restful-api.git
```

### Настройка
Установка зависимостей
```
composer install
```
Установка дополнительных пакетов
```
npm install && npm run dev
```

Переименуйте .env.example в .env, измените значения данных полей
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=marketica
DB_USERNAME=root
DB_PASSWORD="пароль от базы данных"
```

Добавить поле 
```
JWT_TTL=1440
```

### Запуск
Создайте ключи шифрования
```
php artisan key:generate
php artisan jwt:secret
```
Инициализируем миграции
```
php artisan migrate
```

Запускаем сиды (заполнение базы данных)
```
php artisan db:seed
```

Для работы с приложением лучше всего подойдет программа Postman.
