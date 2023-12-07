<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeInstitutionAndEntries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurisdiction', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });


        Schema::table('educational_institution', function (Blueprint $table) {
            $table->bigInteger('jurisdiction_id')->unsigned()->nullable();
        });

        Schema::table('olympiad_entry', function (Blueprint $table) {
            $table->integer('status')->nullable();
        });

        Schema::table('educational_institution', function (Blueprint $table) {
            $table->foreign('jurisdiction_id')->references('id')->on('jurisdiction');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('educational_institution', function (Blueprint $table) {
            $table->dropColumn('jurisdiction_id');
        });

        Schema::table('olympiad_entry', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::dropIfExists('jurisdiction');
    }
}
