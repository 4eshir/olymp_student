<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeOlympiadEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warrant_involvement', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });


        Schema::table('olympiad_entry', function (Blueprint $table) {
            $table->bigInteger('warrant_involvement_id')->unsigned()->nullable();
        });

        Schema::table('olympiad_entry', function (Blueprint $table) {
            $table->foreign('warrant_involvement_id')->references('id')->on('warrant_involvement');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('olympiad_entry', function (Blueprint $table) {
            $table->dropColumn('warrant_involvement_id');
        });

        Schema::dropIfExists('warrant_involvement');
    }
}
