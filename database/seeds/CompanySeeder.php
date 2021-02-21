<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
        {
            $data = [
                [
                    'name' => 'Бутик 26',
                    'phone' => '3453453',
                    'code' => 'Бутик 26',
                    'description' => 'this bouttique has no mall...'
                ],
            ];

            DB::table('companies')->insert($data);
        }
}