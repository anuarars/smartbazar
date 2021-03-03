<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->bigInteger('country_id')->unsigned();
            $table->bigInteger('measure_id')->unsigned();
            $table->bigInteger('company_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->integer('count');
            $table->integer('discount')->nullable();
            $table->string('image');
            $table->integer('views')->default(0);
            $table->string('sku');
            $table->timestamps();
            $table->softDeletes();

            // $table->index(['category_id','brand_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
