<?php

    use Illuminate\Database\Seeder;

    class BrandSeeder extends Seeder
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
                    'title' => 'Nike',
                ],
                [
                    'id' => '2',
                    'title' => 'Adidas',
                ],
                [
                    'id' => '3',
                    'title' => 'Puma',
                ],
                [
                    'id' => '4',
                    'title' => 'LG',
                ],
                [
                    'id' => '5',
                    'title' => 'Siemens',
                ],
                [
                    'id' => '6',
                    'title' => 'Apple',
                ],
                [
                    'id' => '7',
                    'title' => 'Samsung',
                ],
                [
                    'id' => '8',
                    'title' => 'Bosch',
                ],
                [
                    'id' => '9',
                    'title' => 'Asus',
                ],
                [
                    'id' => '10',
                    'title' => 'Hugo Boss',
                ],

            ];

            DB::table('brands')->insert($data);
        }
    }
