<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_adjustments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prepared_by_id');
            $table->unsignedBigInteger('approved_by_id')->nullable();
            $table->unsignedBigInteger('cancelled_by_id')->nullable();
            $table->string('branch_number')->nullable();
            $table->string('adjustment_date');
            $table->string('remarks')->nullable();
            $table->boolean('is_cancelled');
            $table->timestamps();
        });

        Schema::table('inventory_adjustments', function (Blueprint $table) {
            $table->foreign('prepared_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('approved_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cancelled_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_adjustments');
    }
};
