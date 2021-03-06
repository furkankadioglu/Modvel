# Modvel
Modular Pattern &amp; Module Management for Laravel 5

![alt tag](http://3.1m.yt/FbJ6znM.png)

## Installation

The best way to install this package is through your terminal via Composer.

Add the following line to the `composer.json` file and fire `composer update`

```
"furkankadioglu/modvel": "dev-master"
```
Once this operation is complete, simply add the service provider to your project's `config/app.php`

###### Service Provider
```
furkankadioglu\Modvel\ModuleServiceProvider::class,
```

## Config 

Getting to module config file and generators:
```
php artisan vendor:publish
```

### Commands

![alt tag](http://3.1m.yt/FbJ6znM.png)

- php artisan module:make [module name]

![alt tag](http://2.1m.yt/bN-IPyH.png)

- php artisan module:list 

![alt tag](http://2.1m.yt/C1hi4p_.png)

- php artisan module:migrate [module name]

![alt tag](http://1.1m.yt/d9LwBhW.png)

- php artisan module:migrateall

![alt tag](http://2.1m.yt/R3Th887.png)

- php artisan module:delete [module name]

###### Publish Files

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
        |-- Middleware/
            |-- AdminMiddleware.php
    resources/
    |-- views/
        |-- masters/
            |-- admin.blade.php
            |-- main.blade.php

```

###### Example: Test Module Files

```
laravel-project/
    app/
    |-- modules/
        |-- Test
            |-- details.php
            |-- App/
                |-- Controllers/
                    |-- TestAdminSettingsController.php
                    |-- TestAdminController.php
                    |-- TestApiController.php
                    |-- TestController.php
                |-- Middlewares/
                |-- Models/
                    |-- Test.php
                    |-- TestModuleSetting.php
                |-- routes.php
                |-- TestHelpers.php
            |-- Config/
            |-- Resources/
                |-- views/
                    |-- admin/
                        |-- default/
                            |-- index.blade.php
                            |-- show.blade.php
                            |-- destroy.blade.php
                            |-- edit.blade.php
                            |-- create.blade.php
                            |-- settings/
                                |-- index.blade.php
                                |-- create.blade.php
                                |-- destroy.blade.php
                    |-- default/
                        |-- index.blade.php
                        |-- show.blade.php
                |-- lang/
                    |-- en/
                        |-- general.php
                    |-- tr/
                        |-- general.php
            |-- Database/
                |-- seeds/
                |-- migrations/
                    |-- 2016_01_01_010101_Test.php
                    |-- 2016_01_01_010101_TestSettings.php

```
