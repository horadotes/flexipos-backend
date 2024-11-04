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
        Schema::create('bill_payment_cheques', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bills_payment_id');
            $table->string('bank_id');
            $table->string('cheque_number');
            $table->string('cheque_date');
            $table->string('check_voucher_no');
            $table->string('amount');
            $table->timestamps();
        });

        Schema::table('bill_payment_cheques', function (Blueprint $table) {
            $table->foreign('bills_payment_id')->references('id')->on('bill_payments')->onUpdate('cascade')->onDelete('cascade');
            //$table->foreign('bank_id')->references('id')->on('banks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bill_payment_cheques');
    }
};
