<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_category_id');
            $table->string('barcode');
            $table->string('name');
            $table->string('brand');
            $table->string('quantity_onhand');
            $table->string('wholesale_unit');
            $table->string('retail_unit');
            $table->string('wholesale_quantity');
            $table->string('current_price')->default(0);
            $table->string('expiry_date')->nullable();
            $table->string('reorder_point');
            $table->string('markup');
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
