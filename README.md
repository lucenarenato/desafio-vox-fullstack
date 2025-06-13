<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## ✅ TECNOLOGIAS:
- Laravel 11
- PHP8.2
- nginx
- Bootstrap 5
- Postgresql

## Start do projeto
Usar o npm ou pnpm

```sh
pnpm install 
pnpm run dev 
cp .env.example .env
docker-compose up -d
docker exec -it desafio-vox-trello-php-fpm-1 sh
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear && php artisan route:clear && php artisan view:clear && php artisan optimize:clear
chmod -R gu+w storage && chmod -R guo+w storage && chmod -R 777 storage/ && chmod -R 777 storage/* bootstrap/cache/*
composer dump-autoload
php artisan migrate
php artisan db:seed --class=RolePermissionSeeder
php artisan db:seed --class=PermissionTableSeeder
php artisan db:seed --class=CreateAdminUserSeeder

```

<p align="center"><a href="https://github.com/lucenarenato" target="_blank"><img src="#" width="600" alt="print"></a></p>
