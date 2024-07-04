# Inisev Pub/Sub

<!-- [![Quality Score](https://img.shields.io/scrutinizer/quality/g/ikechukwukalu/foodhut/main?style=flat-square)](https://scrutinizer-ci.com/g/ikechukwukalu/foodhut/)
[![Code Quality](https://img.shields.io/codefactor/grade/github/ikechukwukalu/foodhut?style=flat-square)](https://www.codefactor.io/repository/github/ikechukwukalu/foodhut)
[![Vulnerability](https://img.shields.io/snyk/vulnerabilities/github/ikechukwukalu/foodhut?style=flat-square)](https://snyk.io/test/github/ikechukwukalu/foodhut)
[![Github Workflow Status](https://img.shields.io/github/actions/workflow/status/ikechukwukalu/foodhut/foodhut.yml?branch=main&style=flat-square)](https://github.com/ikechukwukalu/foodhut/actions/workflows/foodhut.yml) -->

This is a sample REST API that returns JSON as a response.

## Requirements

- PHP 8.1
- [Laravel 10](https://laravel.com/docs/10.x)
- [MailHog](https://github.com/mailhog/MailHog)
- Redis
- MySQL

## Project setup

```shell
npm install
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

### Run development server

```shell
php artisan serve
npm run build
```

### Run websocket server

```shell
php artisan websocket:serve
```

### Run queue worker

```shell
php artisan optimize:clear
php artisan queue:work
```

### Run tests

```shell
php artisan test
```

### Generate documentation

```shell
php artisan scribe:generate
```

## Note

- Login credentials for customer

``` js
{
    "email": testuser@africanies.com
    "password": $2C00l#@theM0m3nt!
}
```

- Login credentials for staff

``` js
{
    "email": devops@africanies.com
    "password": $2C00l#@theM0m3nt!
}
```

- After generating the documentation, navigate to `/docs` to view and test the APIs within the generated documentation by clicking on the `TRY IT OUT` button. A POSTMAN collection can also be exported from the documentation.
