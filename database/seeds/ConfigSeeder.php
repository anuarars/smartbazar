<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->truncate();

        $configs = [
            [
                'name' => 'FEE',
                'value' => 10
            ],
            [
                'name' => 'URL',
                'value' => 'https://smartbazar.test/'
            ]
        ];

        DB::table('configs')->insert($configs);
    }
}
