# Inisev Pub/Sub

<!-- [![Quality Score](https://img.shields.io/scrutinizer/quality/g/ikechukwukalu/inisev/main?style=flat-square)](https://scrutinizer-ci.com/g/ikechukwukalu/inisev/)
[![Code Quality](https://img.shields.io/codefactor/grade/github/ikechukwukalu/inisev?style=flat-square)](https://www.codefactor.io/repository/github/ikechukwukalu/inisev)
[![Vulnerability](https://img.shields.io/snyk/vulnerabilities/github/ikechukwukalu/inisev?style=flat-square)](https://snyk.io/test/github/ikechukwukalu/inisev)
[![Github Workflow Status](https://img.shields.io/github/actions/workflow/status/ikechukwukalu/inisev/inisev.yml?branch=main&style=flat-square)](https://github.com/ikechukwukalu/inisev/actions/workflows/inisev.yml) -->

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

### Run pub/sub

```shell
php artisan notify:subscribers
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

A broadcast is sent everytime the `api/user/user/pub/create` is called and a new post is added to the `user_pubs` table.


- Login credentials for user

``` js
{
    "email": testuser@inisev.com
    "password": password
}
```

- After generating the documentation, navigate to `/docs` to view and test the APIs within the generated documentation by clicking on the `TRY IT OUT` button. A POSTMAN collection can also be exported from the documentation.
