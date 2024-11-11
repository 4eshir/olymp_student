<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class UpdateAllDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
           $table->timestamp('phone_verified_at')->nullable();
        });

        Schema::table('subject', function (Blueprint $table) {
           $table->integer('actual')->default(1);
        });

        DB::table('user')->increment('class', 1);
        DB::table('subject')->update(['actual' => 0]);

        DB::table('subject')->insert(['name' => 'Искусство (мировая художественная культура)']);
        DB::table('subject')->insert(['name' => 'Испанский язык']);
        DB::table('subject')->insert(['name' => 'Астрономия']);
        DB::table('subject')->insert(['name' => 'Обществознание']);
        DB::table('subject')->insert(['name' => 'Информатика']);
        DB::table('subject')->insert(['name' => 'Химия']);
        DB::table('subject')->insert(['name' => 'Русский язык']);
        DB::table('subject')->insert(['name' => 'Немецкий язык']);
        DB::table('subject')->insert(['name' => 'Физика']);
        DB::table('subject')->insert(['name' => 'Итальянский язык']);
        DB::table('subject')->insert(['name' => 'Китайский язык']);
        DB::table('subject')->insert(['name' => 'Математика']);
        DB::table('subject')->insert(['name' => 'Биология']);
        DB::table('subject')->insert(['name' => 'Право']);
        DB::table('subject')->insert(['name' => 'История']);
        DB::table('subject')->insert(['name' => 'Французский язык']);
        DB::table('subject')->insert(['name' => 'География']);
        DB::table('subject')->insert(['name' => 'Физическая культура']);
        DB::table('subject')->insert(['name' => 'Литература']);
        DB::table('subject')->insert(['name' => '«Техника, технологии и техническое творчество» (труд/технология)']);
        DB::table('subject')->insert(['name' => '«Культура дома, дизайн и технологии» (труд/технология)']);
        DB::table('subject')->insert(['name' => '«Робототехника» (труд/технология)']);
        DB::table('subject')->insert(['name' => '«Информационная безопасность» (труд/технология)']);
        DB::table('subject')->insert(['name' => 'Экология']);
        DB::table('subject')->insert(['name' => 'Английский язык']);
        DB::table('subject')->insert(['name' => 'Основы безопасности и защиты Родины']);
        DB::table('subject')->insert(['name' => 'Экономика']);

        /*DB::table('event')->insert(['subject_id' => 25, 'tour' => 1, 'status' => 1]);   //Искусство
        DB::table('event')->insert(['subject_id' => 26, 'tour' => 1, 'status' => 0]);   //Испанский
        DB::table('event')->insert(['subject_id' => 26, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 27, 'tour' => 1, 'status' => 1]);   //Астрономия
        DB::table('event')->insert(['subject_id' => 28, 'tour' => 1, 'status' => 0]);   //Обществознание
        DB::table('event')->insert(['subject_id' => 28, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 29, 'tour' => 1, 'status' => 0]);   //Информатика
        DB::table('event')->insert(['subject_id' => 29, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 30, 'tour' => 1, 'status' => 0]);   //Химия
        DB::table('event')->insert(['subject_id' => 30, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 31, 'tour' => 1, 'status' => 1]);   //Русский
        DB::table('event')->insert(['subject_id' => 32, 'tour' => 1, 'status' => 0]);   //Немецкий
        DB::table('event')->insert(['subject_id' => 32, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 33, 'tour' => 1, 'status' => 0]);   //Физика
        DB::table('event')->insert(['subject_id' => 33, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 34, 'tour' => 1, 'status' => 0]);   //Итальянский
        DB::table('event')->insert(['subject_id' => 34, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 35, 'tour' => 1, 'status' => 0]);   //Китайский
        DB::table('event')->insert(['subject_id' => 35, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 36, 'tour' => 1, 'status' => 0]);   //Математика
        DB::table('event')->insert(['subject_id' => 36, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 37, 'tour' => 1, 'status' => 0]);   //Биология
        DB::table('event')->insert(['subject_id' => 37, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 38, 'tour' => 1, 'status' => 1]);   //Право
        DB::table('event')->insert(['subject_id' => 39, 'tour' => 1, 'status' => 0]);   //История
        DB::table('event')->insert(['subject_id' => 39, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 40, 'tour' => 1, 'status' => 0]);   //Французский
        DB::table('event')->insert(['subject_id' => 40, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 41, 'tour' => 1, 'status' => 1]);   //География
        DB::table('event')->insert(['subject_id' => 42, 'tour' => 1, 'status' => 0]);   //Физическая
        DB::table('event')->insert(['subject_id' => 42, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 43, 'tour' => 1, 'status' => 1]);   //Литература
        DB::table('event')->insert(['subject_id' => 44, 'tour' => 1, 'status' => 0]);   //Техника
        DB::table('event')->insert(['subject_id' => 44, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 45, 'tour' => 1, 'status' => 0]);   //Культура
        DB::table('event')->insert(['subject_id' => 45, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 46, 'tour' => 1, 'status' => 0]);   //Робототехника
        DB::table('event')->insert(['subject_id' => 46, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 47, 'tour' => 1, 'status' => 0]);   //Информационная
        DB::table('event')->insert(['subject_id' => 47, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 48, 'tour' => 1, 'status' => 0]);   //Экология
        DB::table('event')->insert(['subject_id' => 48, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 49, 'tour' => 1, 'status' => 0]);   //Английский
        DB::table('event')->insert(['subject_id' => 49, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 50, 'tour' => 1, 'status' => 0]);   //Основы
        DB::table('event')->insert(['subject_id' => 50, 'tour' => 2, 'status' => 1]);
        DB::table('event')->insert(['subject_id' => 51, 'tour' => 1, 'status' => 1]);   //Экономика*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropColumns('user', ['phone_verified_at']);
        Schema::dropColumns('subject', ['actual']);

        DB::table('user')->decrement('class', 1);
        DB::table('subject')->where('id', '>', 24)->delete();
    }
}
