<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModvelInformations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modvel_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('displayName');
            $table->string('attribute');
            $table->string('value')->nullable();
        });

         \DB::table('modvel_informations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'brand-name',
                'displayName' => 'brandname',
                'attribute' => 'No Rule',
                'value' => 'Modvel',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'administratorpanelnamebold',
                'displayName' => 'Panel Name Bold',
                'attribute' => 'No Rule',
                'value' => 'MOD',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'administratorpanelnamewhite',
                'displayName' => 'Panel Name White',
                'attribute' => 'No Rule',
                'value' => 'VEL',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'administratorpanelname',
                'displayName' => 'Administrator Panel Name',
                'attribute' => 'No Rule',
                'value' => 'Modvel',
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
        Schema::drop('modvel_informations');
    }
}
