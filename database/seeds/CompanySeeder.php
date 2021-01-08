<?php

use Illuminate\Database\Seeder;

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
                    'id' => '1',
                    'name' => 'Бутик 26',
                    'phone' => '3453453',
                    'address' => 'Бутик 26',
                    'code' => 'Бутик 26'
                ],
            ];

            DB::table('companies')->insert($data);
        }
}