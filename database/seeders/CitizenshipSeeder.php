<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitizenshipSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('citizenship')->insert([
            'name' => 'Гражданство РФ'
        ]);

        DB::table('citizenship')->insert([
            'name' => 'Резидент'
        ]);

        DB::table('citizenship')->insert([
            'name' => 'Иностранный гражданин'
        ]);

        DB::table('citizenship')->insert([
            'name' => 'Иное'
        ]);
    }
}
