<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModvelMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('displayName');
            $table->string('fileName');
            $table->string('categoryName');
            $table->integer('relId');
            $table->timestamps();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->string('displayName');
            $table->string('fileName');
            $table->string('categoryName');
            $table->integer('relId');
            $table->timestamps();
        });

        Schema::create('audios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('displayName');
            $table->string('fileName');
            $table->string('categoryName');
            $table->integer('relId');
            $table->timestamps();
        });

        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('displayName');
            $table->string('fileName');
            $table->string('categoryName');
            $table->integer('relId');
            $table->timestamps();
        });

        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('displayName');
            $table->string('fileName');
            $table->string('categoryName');
            $table->integer('relId');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('photos');
        Schema::drop('documents');
        Schema::drop('audios');
        Schema::drop('videos');
        Schema::drop('files');

    }
}
