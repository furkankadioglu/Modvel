<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModvelModules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modvel_modules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('category');
            $table->string('customer');
            $table->string('icon');
            $table->string('version');
            $table->string('adminDisplayName');    
            $table->string('adminVisible');    
            $table->integer('adminDisplayOrder');    
            $table->string('displayName');    
            $table->string('displayVisible');    
            $table->integer('displayOrder');    
            $table->integer('status')->default(1);
            $table->timestamps();
        });

        \DB::table('modvel_modules')->insert(array (
            0 => 
            array (
                'id' => 17,
                'name' => 'Dashboard',
                'description' => '',
                'category' => 'Dashboard',
                'customer' => 'General',
                'icon' => 'fa fa-tachometer',
                'version' => '1.0.0',
                'adminDisplayName' => 'Dashboard',
                'adminVisible' => '1',
                'adminDisplayOrder' => 0,
                'displayName' => 'Dashboard',
                'displayVisible' => '1',
                'displayOrder' => 0,
                'status' => 1,
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            1 => 
            array (
                'id' => 18,
                'name' => 'Logs',
                'description' => '',
                'category' => 'General',
                'customer' => 'General',
                'icon' => 'fa fa-history',
                'version' => '1.0.0',
                'adminDisplayName' => 'Log Management',
                'adminVisible' => '1',
                'adminDisplayOrder' => 0,
                'displayName' => 'Logs',
                'displayVisible' => '0',
                'displayOrder' => 0,
                'status' => 1,
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            2 => 
            array (
                'id' => 19,
                'name' => 'Modvel',
                'description' => '',
                'category' => 'General',
                'customer' => 'General',
                'icon' => 'fa fa-modx',
                'version' => '1.0.0',
                'adminDisplayName' => 'Modvel Configrations',
                'adminVisible' => '1',
                'adminDisplayOrder' => 0,
                'displayName' => 'Modvel',
                'displayVisible' => '1',
                'displayOrder' => 0,
                'status' => 1,
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            3 => 
            array (
                'id' => 20,
                'name' => 'Pages',
                'description' => '',
                'category' => 'General',
                'customer' => 'General',
                'icon' => 'fa fa-pencil-square-o',
                'version' => '1.0.0',
                'adminDisplayName' => 'Page Management',
                'adminVisible' => '1',
                'adminDisplayOrder' => 0,
                'displayName' => 'Pages',
                'displayVisible' => '1',
                'displayOrder' => 0,
                'status' => 1,
                'created_at' => '2016-08-24 21:29:13',
                'updated_at' => '2016-08-24 21:29:13',
            ),
            4 => 
            array (
                'id' => 21,
                'name' => 'Users',
                'description' => '',
                'category' => 'General',
                'customer' => 'General',
                'icon' => 'fa fa-user',
                'version' => '1.0.0',
                'adminDisplayName' => 'User Management',
                'adminVisible' => '1',
                'adminDisplayOrder' => 0,
                'displayName' => 'Users',
                'displayVisible' => '1',
                'displayOrder' => 0,
                'status' => 1,
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
        Schema::drop('modvel_modules');
    }
}
