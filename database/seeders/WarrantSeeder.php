<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WarrantSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('warrant_involvement')->insert([
            'name' => 'По результатам муниципального (отборочного) этапа 2023/2024 году'
        ]);

        DB::table('warrant_involvement')->insert([
            'name' => 'Победитель/призёр регионального этапа 2022/2023'
        ]);

        DB::table('warrant_involvement')->insert([
            'name' => 'Без обоснования'
        ]);
    }
}
