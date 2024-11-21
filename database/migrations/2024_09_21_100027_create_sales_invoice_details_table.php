<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_invoice_id');
            $table->unsignedBigInteger('product_id');
            $table->string('sales_invoice_ref_doc_no');
            $table->string('barcode');
            $table->string('unit');
            $table->string('expiry_date');
            $table->string('quantity');
            $table->string('price');
            $table->timestamps();
        });

        Schema::table('sales_invoice_details', function (Blueprint $table) {
            $table->foreign('sales_invoice_id')->references('id')->on('sales_invoices')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales_invoice_details');
    }
};
