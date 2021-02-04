<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('short_description');
            $table->text('description');
            $table->integer('icon')->unsigned();
            $table->integer('image')->unsigned();
            $table->timestamps();
        });

        Schema::table('services', function($table) {
            $table->foreign('icon')
                  ->references('id')->on('icons')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('image')
                  ->references('id')->on('medias')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
