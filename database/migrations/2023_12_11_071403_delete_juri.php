<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteJuri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('educational_institution', function (Blueprint $table) {
            $table->dropForeign('educational_institution_jurisdiction_id_foreign');
        });

        Schema::table('educational_institution', function (Blueprint $table) {
            $table->foreign('jurisdiction_id')->references('id')->on('municipality');
        });

        Schema::dropIfExists('jurisdiction');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
