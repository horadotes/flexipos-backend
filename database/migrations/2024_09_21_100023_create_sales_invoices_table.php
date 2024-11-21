<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('sales_order_id')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('prepared_by_id');
            $table->unsignedBigInteger('sales_representative');
            $table->unsignedBigInteger('cancelled_by_id')->nullable();
            $table->unsignedBigInteger('approved_by_id')->nullable();
            $table->string('invoice_no');
            $table->string('date');
            $table->string('due_date');
            $table->string('terms');
            $table->string('amount');
            $table->string('document_no')->nullable();
            $table->string('remarks')->nullable();
            $table->boolean('is_cancelled')->nullable();
            $table->boolean('is_approved')->nullable();
            $table->timestamps();
        });

        Schema::table('sales_invoices', function (Blueprint $table) {
            $table->foreign('branch_id')->references('id')->on('branches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sales_order_id')->references('id')->on('sales_orders')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('prepared_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cancelled_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('approved_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sales_representative')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_invoices');
    }
};
