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
            $table->increments('id');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id', 'FK_products_1')->references('id')->on('categories');
            $table->unsignedInteger('product_type_id');
            $table->foreign('product_type_id', 'FK_products_2')->references('id')->on('product_types');
            $table->unsignedInteger('supplier_id');
            $table->foreign('supplier_id', 'FK_products_3')->references('id')->on('suppliers');

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
