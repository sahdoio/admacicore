<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('company_name')->nullable();
            $table->string('website')->nullable();
            $table->integer('contact')->nullable()->unsigned();
            $table->integer('address')->nullable()->unsigned();
            $table->integer('image')->nullable()->unsigned();
            $table->timestamps();
        });

        Schema::table('clients', function($table) {
            $table->foreign('contact')
                  ->references('id')->on('contacts')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('address')
                  ->references('id')->on('addresses')
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
        Schema::dropIfExists('clients');
    }
}
