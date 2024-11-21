<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('customer_return_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_return_id');
            $table->unsignedBigInteger('product_id');
            $table->string('customer_return_number');
            $table->string('unit');
            $table->string('expiry_date');
            $table->string('quantity');
            $table->string('price');
            $table->timestamps();
        });

        Schema::table('customer_return_details', function (Blueprint $table) {
            $table->foreign('customer_return_id')->references('id')->on('customer_returns')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('customer_return_details');
    }
};
