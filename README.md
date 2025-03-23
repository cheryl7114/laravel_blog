## Laravel 8 Complete Blog

•	Author: Cheryl Kong <br>

## Requirements
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>

## Usage <br>
Setting up your development environment on your local machine: <br>
```
git clone git@github.com:https://github.com/cheryl7114/laravel_blog.git
cd laravel-8-complete-blog
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```

## Before starting <br>
Create a database <br>
```
mysql
create database laravelblog;
exit;
```

Setup your database credentials in the .env file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelblog
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

Migrate the tables and import data
```
php artisan migrate
php artisan db:seed
```

## To start the development server <br>
```
php artisan serve
```

## Features
Two access levels - normal user and admin user <br>
•	All users can leave likes and comments under posts, and delete only their own comments<br>
•	Admin privileges: add, edit, and delete posts<br>

Login as admin with the following credentials:
```
admin@admin.com
123Qwerty@
```


