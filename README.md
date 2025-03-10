# Moderyat

Moderyat is a Laravel package, used as CMS to build business websites quickly. This package serve as Admin panel and provides database schema to hold contents of pages, posts and etc.

## How to install?

Create new Laravel project:

```bash
composer create-project laravel/laravel [project-name]
```

Set up Mysql Database, by changing .env file:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=[database-name]
DB_USERNAME=root
DB_PASSWORD=root
```

Install Laravel/ui package

```bash
composer require laravel/ui
php artisan ui bootstrap --auth
```

Install Moderyat package

```bash
composer require codehubcare/moderyat
php artisan vendor:publish --provider="Codehubcare\Moderyat\ModeryatServiceProvider"
```

Run migrations

```
php artisan migrate
```

Install node modules

```bash
npm install
npm run build

```

Serve the application

```bash
php artisan serve
```

Register a new user and navigate to the Moderyat admin panel:

```
http://127.0.0.1:8000/moderyat
```

<img src="moderyat-screenshot.png"/>

## Code Style

We're are using Laravel pint. To run code format run the following command:

```
./vendor/bin/pint
```
