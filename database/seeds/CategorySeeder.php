<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];
        $cName = "Без Категории";

        $categories[] = [
            'title' => $cName,
            'parent_id' => 0
        ];

        for ($i=1; $i <=40 ; $i++) { 
            $cName = 'Категория #'.$i;
            $parent_id = ($i > 4) ? rand(1,4):1;

            $categories[] = [
                'title' => $cName,
                'parent_id' => $parent_id
            ];
        }

        \DB::table('categories')->insert($categories);
    }
}
