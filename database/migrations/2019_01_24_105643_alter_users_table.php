<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('lastname', 255)
                ->after('name')
                ->nullable();
            $table->text('about')
                ->after('remember_token')
                ->nullable();
            $table->unsignedInteger('media_id')
                ->after('about')
                ->nullable();
            $table->integer('level')
                ->after('media_id')
                ->default(2);


            $table->foreign('media_id')
                ->references('id')->on('medias')
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('lastname');
            $table->dropColumn('about');
            $table->dropForeign(['media_id']);
            $table->dropColumn('media_id');
            $table->dropColumn('level');
        });
    }
}
