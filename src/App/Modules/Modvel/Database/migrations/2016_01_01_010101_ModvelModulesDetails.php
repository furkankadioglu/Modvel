<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModvelModulesDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modvel_modules_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('moduleId')->unsigned();
            $table->string('category');
            $table->string('key');
            $table->string('value');
            $table->timestamps();

            $table->foreign('moduleId')->references('id')->on('modvel_modules')
                ->onUpdate('cascade')->onDelete('cascade');

        });

        \DB::table('modvel_modules_details')->insert(array (
            0 => 
            array (
                'id' => 15,
                'moduleId' => 17,
                'category' => 'requiredModules',
                'key' => '0',
                'value' => 'Users',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            1 => 
            array (
                'id' => 16,
                'moduleId' => 17,
                'category' => 'requiredPackages',
                'key' => 'spatie/laravel-analytics',
                'value' => '^1.4',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            2 => 
            array (
                'id' => 17,
                'moduleId' => 17,
                'category' => 'requiredPackages',
                'key' => 'spatie/browsershot',
                'value' => '^1.5',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            3 => 
            array (
                'id' => 18,
                'moduleId' => 17,
                'category' => 'adminNavigationLinks',
                'key' => 'Genel Durum',
                'value' => '/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            4 => 
            array (
                'id' => 19,
                'moduleId' => 17,
                'category' => 'adminNavigationLinks',
                'key' => 'Ayarlar',
                'value' => '/settings/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            5 => 
            array (
                'id' => 20,
                'moduleId' => 18,
                'category' => 'optionalModules',
                'key' => '0',
                'value' => 'Users',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            6 => 
            array (
                'id' => 21,
                'moduleId' => 18,
                'category' => 'adminNavigationLinks',
                'key' => 'Listele',
                'value' => '/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            7 => 
            array (
                'id' => 22,
                'moduleId' => 18,
                'category' => 'adminNavigationLinks',
                'key' => 'Ayarlar',
                'value' => '/settings/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            8 => 
            array (
                'id' => 23,
                'moduleId' => 19,
                'category' => 'requiredPackages',
                'key' => 'anlutro/l4-settings',
                'value' => '^0.4.8',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            9 => 
            array (
                'id' => 24,
                'moduleId' => 19,
                'category' => 'requiredPackages',
                'key' => 'chumper/zipper',
                'value' => '0.6.x',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            10 => 
            array (
                'id' => 25,
                'moduleId' => 19,
                'category' => 'adminNavigationLinks',
                'key' => 'Moduller',
                'value' => '/modules/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            11 => 
            array (
                'id' => 26,
                'moduleId' => 19,
                'category' => 'adminNavigationLinks',
                'key' => 'Bilgiler',
                'value' => '/informations/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            12 => 
            array (
                'id' => 27,
                'moduleId' => 19,
                'category' => 'adminNavigationLinks',
                'key' => 'Ayarlar',
                'value' => '/settings/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            13 => 
            array (
                'id' => 28,
                'moduleId' => 19,
                'category' => 'adminNavigationLinks',
                'key' => 'Config',
                'value' => '/config/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            14 => 
            array (
                'id' => 29,
                'moduleId' => 19,
                'category' => 'adminNavigationLinks',
                'key' => 'Files',
                'value' => '/files/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            15 => 
            array (
                'id' => 30,
                'moduleId' => 20,
                'category' => 'requiredModules',
                'key' => '0',
                'value' => 'Users',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            16 => 
            array (
                'id' => 31,
                'moduleId' => 20,
                'category' => 'requiredModules',
                'key' => '1',
                'value' => 'Logs',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            17 => 
            array (
                'id' => 32,
                'moduleId' => 20,
                'category' => 'requiredPackages',
                'key' => 'flynsarmy/db-blade-compiler',
                'value' => '2.*',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            18 => 
            array (
                'id' => 33,
                'moduleId' => 20,
                'category' => 'adminNavigationLinks',
                'key' => 'Yeni',
                'value' => '/create',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            19 => 
            array (
                'id' => 34,
                'moduleId' => 20,
                'category' => 'adminNavigationLinks',
                'key' => 'Listele',
                'value' => '/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            20 => 
            array (
                'id' => 35,
                'moduleId' => 20,
                'category' => 'adminNavigationLinks',
                'key' => 'Ayarlar',
                'value' => '/settings/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            21 => 
            array (
                'id' => 36,
                'moduleId' => 20,
                'category' => 'adminNavigationLinks',
                'key' => 'Anasayfa Editoru',
                'value' => '/homepage/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            22 => 
            array (
                'id' => 37,
                'moduleId' => 21,
                'category' => 'requiredModules',
                'key' => '0',
                'value' => 'Logs',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            23 => 
            array (
                'id' => 38,
                'moduleId' => 21,
                'category' => 'requiredPackages',
                'key' => 'required',
                'value' => '"laravel/socialite": "^2.0"',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            24 => 
            array (
                'id' => 39,
                'moduleId' => 21,
                'category' => 'adminNavigationLinks',
                'key' => 'Yeni',
                'value' => '/create',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            25 => 
            array (
                'id' => 40,
                'moduleId' => 21,
                'category' => 'adminNavigationLinks',
                'key' => 'Listele',
                'value' => '/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            26 => 
            array (
                'id' => 41,
                'moduleId' => 21,
                'category' => 'adminNavigationLinks',
                'key' => 'Yetkiler',
                'value' => '/accesslevels/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            27 => 
            array (
                'id' => 42,
                'moduleId' => 21,
                'category' => 'adminNavigationLinks',
                'key' => 'Ekstra Bilgiler',
                'value' => '/informations/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            28 => 
            array (
                'id' => 43,
                'moduleId' => 21,
                'category' => 'adminNavigationLinks',
                'key' => 'Ayarlar',
                'value' => '/settings/',
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
        ));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modvel_modules_details');
    }
}
