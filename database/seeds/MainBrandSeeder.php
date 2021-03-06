<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = DB::connection('mysql_local')->table('brands')->get();
        foreach ($brands as $brand) {
            DB::connection('mysql_main')->table('brands')->insert([
                'id' => $brand->id,
                'title'=> $brand->title
            ]);
        }
    }
}
