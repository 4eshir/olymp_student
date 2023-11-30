<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOlympiadEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olympiad_entry', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('children_event_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('participation_class');
        });

        Schema::table('olympiad_entry', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('olympiad_entry');
    }
}
