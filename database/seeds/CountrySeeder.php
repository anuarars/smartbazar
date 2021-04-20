    
<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        $countries = DB::connection('mysql_main')->table('countries')->get();
        foreach ($countries as $country) {
            DB::connection('mysql_local')->table('countries')->insert([
                'id' => $country->id,
                'name'=>$country->name,
                'code'=>$country->code
            ]);
        }

        // $countries = DB::connection('mysql_local')->table('countries')->get();
        // foreach ($countries as $country) {
        //     DB::connection('mysql_main')->table('countries')->insert([
        //         'id' => $country->id,
        //         'name'=>$country->name,
        //         'code'=>$country->code
        //     ]);
        // }
    }
}