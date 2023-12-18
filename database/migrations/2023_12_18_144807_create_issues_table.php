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
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('type');
            $table->unsignedBigInteger('purchase_product_id')->nullable();
            $table->foreign('purchase_product_id')->references('id')->on('products')->onDelete('set null');
            $table->unsignedBigInteger('free_product_id')->nullable();
            $table->foreign('free_product_id')->references('id')->on('products')->onDelete('set null');
            $table->integer('purchase_quantity')->nullable();
            $table->integer('free_quantity')->nullable();
            $table->integer('lower_limit')->nullable(); 
            $table->integer('upper_limit')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
