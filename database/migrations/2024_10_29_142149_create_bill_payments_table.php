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
        Schema::create('bill_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prepared_by_id');
            $table->unsignedBigInteger('approved_by_id')->nullable();
            $table->unsignedBigInteger('cancelled_by_id')->nullable();
            $table->string('payment_date');
            $table->string('payment_type');
            $table->string('cash_voucher_no');
            $table->boolean('is_cancelled');
            $table->timestamps();
        });

        Schema::table('bill_payments', function (Blueprint $table) {
            $table->foreign('prepared_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cancelled_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('approved_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_payments');
    }
};
