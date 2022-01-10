# Sistem Pakar Pemilihan minat studi
Simple Sistem Pakar Pemilihan minat studi

## Presequete

-   Composer
-   PHP Version 7.4^

## Installation

1. Clone Project
2. Install laravel vendor

```bash
composer install
```

3. Create .env and edit the credential

```bash
cp .env.example .env
```

4. Create laravel key

```bash
php artisan key:generate
```

6. Dump Database

```bash
php artisan migrate
```

7. Dump Dummy data

```bash
php artisan db:seed
```

8. Login with credential

```php
access login page at {bash_url}/login or {bash_url}/dashboard
$email = "tester@gmail.com";
$password = "password";
```

9. Start Server

```bash
php artisan serve
```
## Clear cache
```bash
php artisan config:clear
php artisan cache:clear
composer dump-autoload
php artisan view:clear
php artisan route:clear
```