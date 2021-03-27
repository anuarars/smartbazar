<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function($table) {
            $table->string('image');
        });
        // Schema::create('categories', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->string('description')->nullable();
        //     $table->string('image')->nullable();
        //     $table->integer('parent_id')->unsigned()->default(0);
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
