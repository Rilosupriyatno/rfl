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
        // Schema::create('payment_transaction_details', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('payment_transaction_id');
        //     $table->string('description');
        //     $table->unsignedBigInteger('qty')->default(1);
        //     $table->unsignedBigInteger('price')->default(0);
        //     $table->unsignedBigInteger('discount')->default(0);
        //     $table->unsignedBigInteger('subtotal')->default(0);
        //     $table->timestamps();
        //     $table->foreign('payment_transaction_id')->references('id')->on('payment_transactions')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_transaction_details');
    }
};
