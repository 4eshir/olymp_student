<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEducational extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('educational_institution', function (Blueprint $table) {
            $table->bigInteger('municipality_id')->unsigned()->nullable();
        });

        Schema::table('educational_institution', function (Blueprint $table) {
            $table->foreign('municipality_id')->references('id')->on('municipality');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('educational_institution', function($table) {
            $table->dropColumn('municipality_id');
        });
    }
}
