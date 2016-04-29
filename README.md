# Modvel
Modular Pattern &amp; Module Management for Laravel 5

## Installation

The best way to install this package is through your terminal via Composer.

Add the following line to the `composer.json` file and fire `composer update`

```
"furkankadioglu/modvel": "dev-master"
```
Once this operation is complete, simply add the service provider to your project's `config/app.php`

#### Service Provider
```
furkankadioglu\Modvel\ModuleServiceProvider::class,
```

## Config 

Getting to module config file and generators:
```
php artisan vendor:publish
```

Files


```
laravel-project/
    config/
    |-- modulemanagement.php
    app/
    |-- BaseHelpers.php
    |-- Models/
        |-- Audio.php
        |-- Document.php
        |-- UploadedFile.php
        |-- Photo.php
        |-- Video.php
    |-- Http/
        |-- Controllers/
            |-- AdminTemplateController.php
            |-- MainTemplateController.php
            |-- AdminController.php
            |-- MainController.php
    resources/
    |-- views/
        |-- masters/
            |-- admin.blade.php
            |-- main.blade.php

```

