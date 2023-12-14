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
        // Schema::create('prescription_sales', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('pharmacist_id');
        //     $table->string('code');
        //     $table->string('prescription_number');
        //     $table->string('name', 128);
        //     $table->string('doctor', 128);
        //     $table->date('date');
        //     $table->unsignedFloat('discount')->default(0);
        //     $table->unsignedFloat('tax')->default(0);
        //     $table->unsignedFloat('grandtotal')->default(0);
        //     $table->timestamps();
        //     $table->foreign('pharmacist_id')->references('id')->on('pharmacists')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prescription_sales');
    }
};
