<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->string('jobtitle');
            $table->unsignedInteger('address_id')->nullable();
            $table->unsignedInteger('contact_id')->nullable();
            $table->timestamps();
        });

        Schema::table('members', function($table) {
            $table->foreign('address_id')
                ->references('id')->on('addresses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('contact_id')
                ->references('id')->on('contacts')
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
        Schema::dropIfExists('members');
    }
}

