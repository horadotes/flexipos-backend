<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_id');
            $table->unsignedBigInteger('product_id');
            $table->string('quantity');
            $table->string('payment_method_id');
            $table->string('bank_id')->nullable();
            $table->string('cheque_number')->nullable();
            $table->string('cheque_date')->nullable();
            $table->string('amount');
            $table->string('sales_invoice_no')->nullable();
            $table->timestamps();
        });

        Schema::table('payment_details', function (Blueprint $table) {
            $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_details');
    }
};
