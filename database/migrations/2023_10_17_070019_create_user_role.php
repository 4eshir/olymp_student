<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateUserRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //--Создаем таблицы--

        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('municipality', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('educational_institution', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
        });

        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->string('phone_number', 11);
            $table->string('email');
            $table->string('address');
            $table->date('birthdate');
            $table->integer('municipality_id');
            $table->integer('educational_institution_id');
            $table->integer('class');
            $table->integer('role_id');
        });

        //-------------------


        //--Добавляем данные--

        DB::table('role')->insert(['name' => 'Администратор']);
        DB::table('role')->insert(['name' => 'Обучающийся']);

        DB::table('municipality')->insert(['name' => 'Ахтубинский район']);
        DB::table('municipality')->insert(['name' => 'Володарский район']);
        DB::table('municipality')->insert(['name' => 'Город Астрахань']);
        DB::table('municipality')->insert(['name' => 'Енотаевский район']);
        DB::table('municipality')->insert(['name' => 'ЗАТО Знаменск']);
        DB::table('municipality')->insert(['name' => 'Икрянинский район']);
        DB::table('municipality')->insert(['name' => 'Камызякский район']);
        DB::table('municipality')->insert(['name' => 'Красноярский район']);
        DB::table('municipality')->insert(['name' => 'Лиманский район']);
        DB::table('municipality')->insert(['name' => 'Наримановский район']);
        DB::table('municipality')->insert(['name' => 'Приволжский район']);
        DB::table('municipality')->insert(['name' => 'Харабалинский район']);
        DB::table('municipality')->insert(['name' => 'Черноярский район']);

        DB::table('educational_institution')->insert(['name' => 'МБОУ г. Астрахани "Лицей №1"', 'address' => 'г. Астрахань, ул. Щелгунова, 14']);
        DB::table('educational_institution')->insert(['name' => 'МБОУ г. Астрахани "Гимназия №3"', 'address' => 'г. Астрахань, пл. Шаумяна, 1А']);

        //--------------------
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
        Schema::dropIfExists('role');
        Schema::dropIfExists('municipality');
        Schema::dropIfExists('educational_institution');
    }
}
