# Laravel Todo with VueJS
[![Laravel Todo with VueJS](https://raw.githubusercontent.com/ismoil-nosr/todo-laravel/dev/Screenshot.jpg "Laravel Todo with VueJS")](https://todo-vue.github.uz/ "Laravel Todo with VueJS")

# Demo
[https://todo-vue.github.uz](https://todo-vue.github.uz "https://todo-vue.github.uz")

# Installation
```bash
git clone https://github.com/ismoil-nosr/todo-laravel.git
cd todo-laravel/
composer install
php artisan migrate --seed
```

## Docker
First create an image:

    sudo docker build -f ./.deploy/Dockerfile -t laravel_todo

Then run container:

    sudo docker run -d -t -i -e APP_ENV='development' \ 
    -e DB_CONNECTION='mysql' \
    -e DB_HOST='mysql_server' \
    -e DB_PORT='3306' \
    -e DB_DATABASE='laravel_todo' \
    -e DB_USERNAME='laravel_todo \
	-e DB_PASSWORD='password' \
    -p 80:80 \
	-p 443:443\
    --name laravel_todo

## Docker-compose
```bash
git clone https://github.com/ismoil-nosr/todo-laravel.git
cd todo-laravel/
docker-compose up -d
```

- PHP: 7.4 FPM
- DB: MySQL 5.7.29
- WebServer: Caddy 2.x
- Supervisord: latest
- Composer: latest

## Troubleshootings
**Login/Register not working**: If site has SSL enabled, put the code below into `boot` section of `app/Providers/AppServiceProvider.php`
```php
if (env('APP_ENV') === 'production') {
    \Illuminate\Support\Facades\URL::forceScheme('https');
}
```

## Useful links
- [Laravel Framework](https://github.com/laravel/framework "Laravel Framework")
- [Laravel Caprover boilerplate](https://github.com/jackbrycesmith/laravel-caprover-template "Laravel Caprover boilerplate")
- [Caprover PaaS Manager](https://github.com/caprover/caprover "Caprover PaaS Manager")
