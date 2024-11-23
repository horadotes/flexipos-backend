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
        Schema::create('credit_memos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prepared_by_id');
            $table->unsignedBigInteger('cancelled_by_id')->nullable();
            $table->unsignedBigInteger('sales_representative_id')->nullable();
            $table->unsignedBigInteger('customer_id');
            $table->string('credit_type');
            $table->string('invoice_no');
            $table->string('sales_invoice_document_no');
            $table->string('date');
            $table->string('amount');
            $table->string('remarks')->nullable();
            $table->boolean('is_cancelled');
            $table->timestamps();
        });

        Schema::table('credit_memos', function (Blueprint $table) {
            $table->foreign('prepared_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cancelled_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sales_representative_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('credit_memos');
    }
};
