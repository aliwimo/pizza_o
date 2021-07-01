<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pizza_id');
            $table->unsignedInteger('order_id');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('pizza_id')->references('id')->on('pizzas');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pizza_orders');
    }
}
