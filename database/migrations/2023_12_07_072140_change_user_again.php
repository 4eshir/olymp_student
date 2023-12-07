<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUserAgain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizenship', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });


        Schema::table('user', function (Blueprint $table) {
            $table->string('sex')->nullable();
            $table->boolean('disabilities')->nullable();
            $table->bigInteger('citizenship_id')->unsigned()->nullable();
        });

        Schema::table('user', function (Blueprint $table) {
            $table->foreign('citizenship_id')->references('id')->on('citizenship');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('sex');
            $table->dropColumn('disabilities');
            $table->dropColumn('citizenship_id');
        });

        Schema::dropIfExists('citizenship');
    }
}
