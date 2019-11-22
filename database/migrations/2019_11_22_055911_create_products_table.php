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
            $table->bigIncrements('id');
            $table->boolean('enable')->default(1);
            $table->string('name');
            $table->string('sku')->unique();
            $table->string('product_image')->nullable();
            $table->text('short_description')->nullable();
            $table->mediumText('description')->nullable();
            $table->date('new_product_start_date')->nullable();
            $table->date('new_product_end_date')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('attribute_set_row_id')->nullable();
            $table->string('attribute_set_type')->nullable();
            $table->tinyInteger('type')->default(0);
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_image')->nullable();
            $table->string('slug')->unique();
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
        Schema::dropIfExists('products');
    }
}
