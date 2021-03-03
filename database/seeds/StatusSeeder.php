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
        DB::table('statuses')->truncate();

        $statuses = [
            ['name' => 'NOT PAID'],
            ['name' => 'LOOKING FOR PACKING'],
            ['name' => 'AT PACKING'],
            ['name' => 'LOOKING FOR DRIVER'],
            ['name' => 'DRIVING'],
            ['name' => 'DELIVERED'],
            ['name' => 'ACCEPTED']
        ];

        DB::table('statuses')->insert($statuses);
    }
}
