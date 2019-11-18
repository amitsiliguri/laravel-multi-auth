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
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('enable')->default(true);
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('show_short_description')->default(false);
            $table->text('short_description')->nullable();
            $table->boolean('show_description')->default(false);
            $table->mediumText('description')->nullable();
            $table->boolean('full_width_banner')->default(true);
            $table->string('banner_image')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_image')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
