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
        // Schema::create('payment_transactions', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('patient_queue_id');
        //     $table->string('code');
        //     $table->unsignedBigInteger('discount')->default(0);
        //     $table->unsignedBigInteger('tax')->default(0);
        //     $table->unsignedBigInteger('grandtotal')->default(0);
        //     $table->timestamps();
        //     $table->foreign('patient_queue_id')->references('id')->on('patient_queues')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('payment_transactions');
    }
};
