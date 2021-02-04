<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteviewsOnlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_control', function (Blueprint $table) {
            $table->increments('id');
            $table->string('session');
            $table->datetime('startview');
            $table->datetime('endview');
            $table->string('ip');
            $table->text('url');
            $table->text('agent');
            $table->string('agent_name');
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
        Schema::dropIfExists('session_control');
    }
}
