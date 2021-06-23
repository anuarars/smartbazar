<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainWeekdaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $weekdays = DB::connection('mysql_local')->table('weekdays')->get();
        foreach ($weekdays as $weekday) {
            DB::connection('mysql_main')->table('weekdays')->insert([
                'id'=>$weekday->id,
                'name'=> $weekday->name
            ]);
        }
    }
}
