<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = DB::connection('mysql_main')->table('statuses')->get();
        foreach ($statuses as $status) {
            DB::connection('mysql_local')->table('statuses')->insert([
                'id'=>$status->id,
                'name'=> $status->name
            ]);
        }

        // $statuses = DB::connection('mysql_local')->table('statuses')->get();
        // foreach ($statuses as $status) {
        //     DB::connection('mysql_main')->table('statuses')->insert([
        //         'id'=>$status->id,
        //         'name'=> $status->name
        //     ]);
        // }

        
    }
}