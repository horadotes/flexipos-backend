<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_adjustment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_adjustment_id');
            $table->unsignedBigInteger('product_id');
            $table->string('unit');
            $table->string('expiry_date');
            $table->string('quantity');
            $table->string('remarks');
            $table->timestamps();
        });

        Schema::table('inventory_adjustment_details', function (Blueprint $table) {
            $table->foreign('inventory_adjustment_id')->references('id')->on('inventory_adjustments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_adjustment_details');
    }
};
