<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_invoice_id');
            $table->unsignedBigInteger('prepared_by_id');
            $table->unsignedBigInteger('approved_by_id');
            $table->unsignedBigInteger('cancelled_by_id');
            $table->string('branch_number');
            $table->string('return_date');
            $table->string('remarks');
            $table->boolean('is_cancelled');
            $table->timestamps();
        });

        Schema::table('customer_returns', function (Blueprint $table) {
            $table->foreign('sales_invoice_id')->references('id')->on('sales_invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prepared_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('approved_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cancelled_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_returns');
    }
};
