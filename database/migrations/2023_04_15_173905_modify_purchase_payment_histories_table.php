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
        // Schema::table('purchase_payment_histories', function (Blueprint $table) {
        //     $table->unsignedBigInteger('grandtotal')->change();
        //     $table->unsignedBigInteger('paid')->change();
        //     $table->unsignedBigInteger('remaining')->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('purchase_payment_histories', function (Blueprint $table) {
        //     $table->unsignedFloat('grandtotal')->change();
        //     $table->unsignedFloat('paid')->change();
        //     $table->unsignedFloat('remaining')->change();
        // });
    }
};
