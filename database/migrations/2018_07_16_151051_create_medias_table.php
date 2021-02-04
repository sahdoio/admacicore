<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('medias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();;
            $table->text('subtitle')->nullable();;
            $table->text('url')->nullable();
            $table->text('html')->nullable();
            $table->integer('category_id')->unsigned()->nullable();
            $table->integer('type_id')->unsigned()->nullable()->default(\App\Models\MediaType::GENERIC);
            $table->timestamps();
        });

        Schema::table('medias', function($table) {
            $table->foreign('category_id')
                  ->references('id')->on('media_categories')
                  ->onDelete('set null')
                  ->onUpdate('cascade');

            $table->foreign('type_id')
                ->references('id')->on('media_types');
        });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('medias');
    }
}
