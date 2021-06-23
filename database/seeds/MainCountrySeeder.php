<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainCountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = DB::connection('mysql_local')->table('countries')->get();
        foreach ($countries as $country) {
            DB::connection('mysql_main')->table('countries')->insert([
                'id' => $country->id,
                'name'=>$country->name,
                'code'=>$country->code
            ]);
        }
    }
}
