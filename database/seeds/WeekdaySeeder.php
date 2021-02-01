<?php

use App\Models\Weekday;
use Illuminate\Database\Seeder;

class WeekdaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Weekday::create(['name'=>'Monday']);
        Weekday::create(['name'=>'Tuesday']);
        Weekday::create(['name'=>'Wednesday']);
        Weekday::create(['name'=>'Thursday']);
        Weekday::create(['name'=>'Friday']);
        Weekday::create(['name'=>'Saturday']);
        Weekday::create(['name'=>'Sunday']);
    }
}
