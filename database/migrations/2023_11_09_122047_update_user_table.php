<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            $table->string('name', 50)->nullable()->change();
            $table->string('surname', 50)->nullable()->change();
            $table->string('patronymic', 50)->nullable()->change();
            $table->string('address', 1000)->nullable()->change();
            $table->date('birthdate')->nullable()->change();
            $table->bigInteger('municipality_id')->nullable()->unsigned()->change();
            $table->bigInteger('educational_institution_id')->nullable()->unsigned()->change();
            $table->integer('class')->nullable()->change();
            $table->bigInteger('role_id')->nullable()->unsigned()->change();
        });

        Schema::table('user', function (Blueprint $table) {
            $table->string('password');
        });

        Schema::table('user', function (Blueprint $table) {
            $table->foreign('municipality_id')->references('id')->on('municipality');
            $table->foreign('educational_institution_id')->references('id')->on('educational_institution');
            $table->foreign('role_id')->references('id')->on('role');
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
            $table->dropForeign('user_educational_institution_id_foreign');
            $table->dropForeign('user_municipality_id_foreign');
            $table->dropForeign('user_role_id_foreign');
        });

        Schema::table('user', function (Blueprint $table) {
            $table->string('name', 50)->nullable(false)->change();
            $table->string('surname', 50)->nullable(false)->change();
            $table->string('patronymic', 50)->nullable(false)->change();
            $table->string('address', 50)->nullable(false)->change();
            $table->date('birthdate')->nullable(false)->change();
            $table->bigInteger('municipality_id')->nullable(false)->change();
            $table->bigInteger('educational_institution_id')->nullable(false)->change();
            $table->integer('class')->nullable(false)->change();
            $table->bigInteger('role_id')->nullable(false)->change();
        });

        Schema::table('user', function (Blueprint $table) {
            $table->dropColumn('password');
        });

    }
}
