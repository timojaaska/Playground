## laravel komentoja
avaa laracon ikkunasta terminal jotta 'php artisan' komento toimii

### Eloquent
https://laravel.com/docs/10.x/eloquent#generating-model-classes

Laravel Modelin luonti
```
php artisan make:model Playground --migration
```
### Migraatiot
https://laravel.com/docs/10.x/migrations

Migraatioiden ajo
```
php artisan migrate
```
mikraatioiden palautus edelliseen
```
php artisan migrate:rollback
```
mikraatioiden resetointi
```
php artisan migrate:reset
```
migraatioiden poisto ja uudelleen ajo
```
php artisan migrate:fresh
```
### Seedaus
https://laravel.com/docs/10.x/seeding

seedaus testi datan luominen
```
php artisan db:seed
```
### Controllerit
https://laravel.com/docs/10.x/controllers

```
php artisan make:controller ControllerinNimi
```
### Views
https://laravel.com/docs/10.x/views

viewin luonti

```
php artisan make:view playgrounds/index
```

https://laravel.com/docs/10.x/authentication#authentication-quickstart

composer require laravel/ui "^4.2" --dev
php artisan ui bootstrap --auth

### Bootstrap
https://getbootstrap.com/docs/5.3/getting-started/introduction/

### Boostrap ikonit
https://icons.getbootstrap.com/ 

```
php artisan serve
```
### Modelin riippuvuuksien lataaminen(with)
https://laravel.com/docs/10.x/eloquent-relationships#eager-loading

### PHP 8.1 version käyttö
/opt/cpanel/ea-php81/root/usr/bin/php /opt/cpanel/composer/bin/composer install
[ummapclx@hotelli04 laravel]$ /opt/cpanel/ea-php81/root/usr/bin/php /opt/cpanel/composer/bin/composer install

/opt/cpanel/ea-php81/root/usr/bin/php artisan migrate
/opt/cpanel/ea-php81/root/usr/bin/php artisan db:seed