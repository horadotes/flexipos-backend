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
        Schema::create('payment_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });

        // Schema::table('payment_invoice_details', function (Blueprint $table) {
        //     // $table->foreign('payment_id')->references('id')->on('payments')->onUpdate('cascade')->onDelete('cascade');
        //     // $table->foreign('sales_invoice_id')->references('id')->on('sales_invoices')->onUpdate('cascade')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_invoice_details');
    }
};
