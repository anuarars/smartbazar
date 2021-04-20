<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('isFinished')->default(0);
            $table->integer('status_id')->default(1);
            $table->bigInteger('user_id');
            $table->bigInteger('packer_id')->nullable();
            $table->bigInteger('delivery_id')->nullable();
            $table->bigInteger('address_id')->nullable();
            $table->string('phone')->nullable();
            $table->text('infoByUser')->nullable();
            $table->text('infoByPacker')->nullable();
            $table->boolean('isPickup')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
