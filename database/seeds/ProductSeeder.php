<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = DB::connection('mysql_main')->table('products')->get();
        foreach ($products as $product) {
            DB::connection('mysql_local')->table('products')->insert([
                'id' => $product->id,
                'category_id' => $product->category_id,
                'user_id' => $product->user_id,
                'country_id' => $product->country_id,
                'measure_id' => $product->measure_id,
                'company_id' => $product->company_id,
                'title' => $product->title,
                'description' => $product->description,
                'price' => $product->price,
                'count' => $product->count,
                'discount' => $product->discount,
                'sku' => $product->sku
            ]);
        }
    }
}