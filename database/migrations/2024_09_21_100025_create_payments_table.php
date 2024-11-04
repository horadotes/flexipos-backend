<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('branch_no')->nullable();
            $table->unsignedBigInteger('prepared_by_id');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('approvedby')->nullable();
            $table->string('or_number')->nullable();
            $table->boolean('is_approved');
            $table->boolean('is_cancelled');
            $table->string('payment_date');
            $table->string('cancelled_by_id')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->foreign('prepared_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('approvedby')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
