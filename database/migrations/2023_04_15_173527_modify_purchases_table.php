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
        // Schema::table('purchases', function (Blueprint $table) {
        //     $table->unsignedBigInteger('tax')->default(0)->change();
        //     $table->unsignedBigInteger('paid')->default(0)->change();
        //     $table->unsignedBigInteger('remaining')->default(0)->change();
        //     $table->unsignedBigInteger('grandtotal')->default(0)->nullable(true)->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('purchases', function (Blueprint $table) {
        //     $table->unsignedFloat('tax')->default(0)->change();
        //     $table->unsignedFloat('paid')->default(0)->change();
        //     $table->unsignedFloat('remaining')->default(0)->change();
        //     $table->unsignedFloat('grandtotal')->default(0)->nullable(true)->change();
        // });
    }
};
