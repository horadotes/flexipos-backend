<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('processed_by_id');
            $table->unsignedBigInteger('customer_id');
            $table->string('date');
            $table->string('total_amount');
            $table->string('discount');
            $table->string('tax_amount');
            $table->timestamps();
        });

        Schema::table('sales_orders', function (Blueprint $table) {
            $table->foreign('processed_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_orders');
    }
};
