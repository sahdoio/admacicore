<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned()->nullable();
            $table->integer('media_id')->unsigned()->nullable();
            $table->integer('position')->nullable();
            $table->timestamps();
        });

        Schema::table('job_media', function($table) {
            $table->foreign('job_id')
                  ->references('id')
                  ->on('jobs')
                  ->onDelete('cascade');

            $table->foreign('media_id')
                  ->references('id')
                  ->on('medias')
                  ->onDelete('set null');

            $table->unique(['job_id', 'position'], 'unq_acesso');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_media');
    }
}
