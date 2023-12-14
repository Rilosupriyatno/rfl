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
        // Schema::create('prescription_sale_details', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('prescription_sale_id');
        //     $table->unsignedBigInteger('medicine_id');
        //     $table->unsignedBigInteger('medicine_batch_id');
        //     $table->unsignedFloat('qty');
        //     $table->unsignedFloat('price');
        //     $table->unsignedFloat('discount');
        //     $table->unsignedFloat('subtotal');
        //     $table->timestamps();
        //     $table->foreign('prescription_sale_id')->references('id')->on('prescription_sales')->onDelete('cascade');
        //     $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade');
        //     $table->foreign('medicine_batch_id')->references('id')->on('medicine_batches')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_sale_details');
    }
};
