<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = DB::connection('mysql_main')->table('categories')->get();
        foreach ($categories as $category) {
            DB::connection('mysql_local')->table('categories')->insert([
                'id' => $category->id,
                'title'=> $category->title,
                'parent_id'=>$category->parent_id
            ]);
        }

        // $categories = DB::connection('mysql_local')->table('categories')->get();
        // foreach ($categories as $category) {
        //     DB::connection('mysql_main')->table('categories')->insert([
        //         'id' => $category->id,
        //         'title'=> $category->title,
        //         'parent_id'=>$category->parent_id
        //     ]);
        // }
    }
}