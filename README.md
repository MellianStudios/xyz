## Install
1. cp .env.example .env
2. create DB and configure credentials in .env
3. composer install
4. php artisan key:generate --ansi
5. php artisan migrate
6. npm install

### Running
1. php artisan serve
2. vite

### Analysis & Testing
1. ./vendor/bin/phpstan analyse
