<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Schema::create('purchase_details', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('purchase_id');
        //     $table->unsignedBigInteger('medicine_id');
        //     $table->unsignedFloat('qty');
        //     $table->unsignedFloat('price');
        //     $table->unsignedFloat('tax');
        //     $table->unsignedFloat('discount');
        //     $table->unsignedFloat('subtotal');
        //     $table->timestamps();
        //     $table->foreign('purchase_id')->references('id')->on('purchases')->onDelete('cascade');
        //     $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_details');
    }
};
