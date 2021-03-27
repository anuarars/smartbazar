<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $galleries = DB::connection('mysql_main')->table('galleries')->get();
        foreach ($galleries as $gallery) {
            DB::connection('mysql_local')->table('galleries')->insert([
                'id' => $gallery->id,
                'image' => $gallery->image,
                'product_id' => $gallery->product_id,
                'user_id' => $gallery->user_id
            ]);
        }
    }
}