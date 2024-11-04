<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spoilage_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('spoilage_id');
            $table->unsignedBigInteger('product_id');
            $table->string('quantity');
            $table->string('description');
            $table->string('financial_impact');
            $table->timestamps();
        });

        Schema::table('spoilage_details', function (Blueprint $table) {
            $table->foreign('spoilage_id')->references('id')->on('spoilages')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spoilage_details');
    }
};
