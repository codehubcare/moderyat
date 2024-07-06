# Moderyat

Moderyat is a Laravel package, used as CMS to build business websites quickly. This package serve as Admin panel and provides database schema to hold contents of pages, posts and etc.

## How to install?

1. Create new Laravel app

```bash
Laravel new business-website
```

2. Install Laravel/ui package

```bash
composer require laravel/ui
```

3. Install Moderyat package

```bash
composer require codehubcare/moderyat
```

4. Run migrations

```
php artisan migrate
```

## How to use

1. Register a user account
2. Login to your newly created account.
3. Visit to the following url:

```
http://127.0.0.1:8000/moderyat
```

## Formate styles

We're are using Laravel pint. To run code format run the following command:

```
./vendor/bin/pint
```
