<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = DB::connection('mysql_local')->table('cities')->get();
        foreach ($cities as $city) {
            DB::connection('mysql_main')->table('cities')->insert([
                'id' => $city->id,
                'name'=> $city->name,
            ]);
        }
    }
}
