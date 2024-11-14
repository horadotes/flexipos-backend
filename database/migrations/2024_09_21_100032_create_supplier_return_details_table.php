<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('supplier_return_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('supplier_return_id');
            $table->string('supplier_return_number');
            $table->string('unit');
            $table->string('expiry_date');
            $table->string('quantity');
            $table->string('price');
            $table->timestamps();
        });

        Schema::table('supplier_return_details', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('supplier_return_id')->references('id')->on('supplier_returns')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('supplier_return_details');
    }
};
