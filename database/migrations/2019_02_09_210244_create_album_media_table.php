<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album_media', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('album_id');
            $table->unsignedInteger('media_id');
            $table->timestamps();

            $table->foreign('album_id')
                ->references('id')
                ->on('albums')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('media_id')
                ->references('id')
                ->on('medias')
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
        Schema::dropIfExists('album_media');
    }
}
