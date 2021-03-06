# Modvel
Laravel 5 için Moduler Pattern ve Modül Yönetimi 

![alt tag](http://1.1m.yt/S1OTMoa.png)

## Yükleme / Kurulum

Tavsiye edilen yükleme yöntemi, composer aracılığıyla bu işlemi yapmanız.

Aşağıdaki satırı `composer.json` dosyasına ekledikten sonra consoledan `composer update` yazmalısınız.

```
"furkankadioglu/modvel": "dev-master"
```

Sonrasında Service Provider'ı tanıtmak gerekiyor, `config/app.php` dosyasını açıp providers kısmına alttaki satırı ekliyoruz.

###### Service Provider
```
furkankadioglu\Modvel\ModuleServiceProvider::class,
```

## Config & Publish & Dosyalar

Modular sistem dosyalarını oluşturmak için, console'a şunu yazıyoruz:
```
php artisan vendor:publish
```

### Komutlar

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

###### Publish ile hangi dosyalar geliyor?

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

###### Örnek: Bir "Test" modülü oluşturulduğunda oluşturulan dizinler ve dosyalar

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



###### Dosyalar - Config > modulemanagement.php

Config dosyasından genel ayarlar yapılıyor. Oluşturulan modüllerin cache'de tutulma süresi, dizin yolu, ana teması ve admin teması ayarları tutuluyor.

######  Dosyalar - App > BaseHelpers.php

Bu dosyada modüllerin yüklenmesi için gereken fonksiyonlar, temel modellerin fonksiyonları ve cache de tutulması için gereken fonksiyonlar var. Modüllerin detaylarının alınması gibi konular burada.

######  Dosyalar - App > Models

Uzun vadede size gerekecek olan modeller var. Bu modelleri modüllerinizde kullanmanız iyi olabilir çünkü genel olarak tüm modüllerde kullanabilecek şeyler. Örneğin bir Users modülü kodluyorsanız profil fotoğrafınızı Photo olarak tutmanız sizin işinize gelir, photoId şeklinde de kullanıcı tarafında tutabilirsiniz, size kalmış.

######  Dosyalar - App > Http > Controllers

TemplateController dosyaları genel olarak view dosyalarına ve master bladelere veri göndermeniz için var. Örneğin admin paneli oluşturuyorsunuz ve admin.blade.php üzerinden yüklü modülleri her sayfada listeletmek istiyorsanız TemplateControllerları kullanmanız çok işinizi kolaylaştıracaktır.

######  Dosyalar - Resources > Views > Masters

Layoutları oluşturmanız için gereken bölüm burası. Sizin için iki tane hazır geliyor. Bir tanesi admin bölümünüz için, diğeri ise ziyaretçileriniz için.

###### Example: Test Module Files






