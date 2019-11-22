<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFashionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fashions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity')->default(0);
            $table->boolean('in_stock')->default(1);
            $table->boolean('back_order')->default(0);
            $table->smallInteger('out_of_stock_alert')->default(10);
            $table->integer('min_qty_allow_to_add_to_cart')->default(1);
            $table->integer('max_qty_allow_to_add_to_cart')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('manufacturer_country')->nullable();
            $table->float('base_price', 8, 2);
            $table->float('special_price', 8, 2);
            $table->string('size');
            $table->string('color');
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
        Schema::dropIfExists('fashions');
    }
}
