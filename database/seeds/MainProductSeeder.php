<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MainProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = DB::connection('mysql_local')->table('products')->get();
        foreach ($products as $product) {
            DB::connection('mysql_main')->table('products')->insert([
                'id' => $product->id,
                'category_id' => $product->category_id,
                'user_id' => $product->user_id,
                'country_id' => $product->country_id,
                'measure_id' => $product->measure_id,
                'title' => $product->title,
                'description' => $product->description,
            ]);
        }

        $items = DB::connection('mysql_local')->table('company_product')->get();
        foreach ($items as $item) {
            DB::connection('mysql_main')->table('company_product')->insert([
                'id' => $item->id,
                'company_id' => $item->company_id,
                'product_id' => $item->id,
                'count' => $item->count,
                'discount' => $item->discount,
                'views' => $item->views,
                'isPublished' => $item->isPublished,
                'price' => $item->price,
            ]);
        }
    }
}
