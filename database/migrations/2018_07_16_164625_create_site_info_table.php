<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('media_id')->unsigned()->nullable();
            $table->integer('contact_id')->unsigned()->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('media_id')
                ->references('id')->on('medias')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('contact_id')
                ->references('id')->on('contacts')
                ->onDelete('set null')
                ->onUpdate('cascade');

            $table->foreign('address_id')
                ->references('id')->on('addresses')
                ->onDelete('set null')
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
        Schema::dropIfExists('site_info');
    }
}
