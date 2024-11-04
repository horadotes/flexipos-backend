<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spoilages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reported_by_id');
            $table->unsignedBigInteger('product_id');
            $table->string('quantity');
            $table->string('damage_type');
            $table->boolean('status');
            $table->timestamps();
        });

        Schema::table('spoilages', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('reported_by_id')->references('id')->on('employees')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spoilages');
    }
};
