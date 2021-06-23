<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = DB::connection('mysql_local')->table('categories')->get();
        foreach ($categories as $category) {
            DB::connection('mysql_main')->table('categories')->insert([
                'id' => $category->id,
                'title'=> $category->title,
                'image' => $category->image,
                'parent_id'=>$category->parent_id
            ]);
        }
    }
}
