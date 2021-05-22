<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->truncate();

        $cities = [
            ['name' => 'Нур-Султан'],
            ['name' => 'Алматы'],
            ['name' => 'Шымкент'],
            ['name' => 'Караганда'],
        ];

        DB::table('cities')->insert($cities);
    }
}
