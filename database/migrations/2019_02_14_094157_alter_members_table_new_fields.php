<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterMembersTableNewFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('members', function (Blueprint $table) {
            $table->unsignedInteger('media_id')->nullable()->after('contact_id');
            $table->string('rg', 100)->nullable()->after('media_id');
            $table->string('cpf', 100)->nullable()->after('rg');
            $table->date('birth_date')->nullable()->after('cpf');
            $table->string('ministerial_function', 255)->nullable()->after('birth_date');
            $table->date('baptism_date')->nullable()->after('ministerial_function');
            $table->integer('civil_status')->nullable()->after('baptism_date');
            $table->string('father_name', 255)->nullable()->after('civil_status');
            $table->string('mother_name', 255)->nullable()->after('father_name');
            $table->string('birth_city', 255)->nullable()->after('mother_name');
            $table->string('nationality', 255)->nullable()->after('birth_city');

            $table->foreign('media_id')
                ->references('id')
                ->on('medias')
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
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign(['media_id']);
            $table->dropColumn('media_id');
            $table->dropColumn('rg');
            $table->dropColumn('cpf');
            $table->dropColumn('birth_date');
            $table->dropColumn('ministerial_function');
            $table->dropColumn('baptism_date');
            $table->dropColumn('civil_status');
            $table->dropColumn('father_name');
            $table->dropColumn('mother_name');
            $table->dropColumn('birth_city');
            $table->dropColumn('nationality');
        });
    }
}
