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
        // Schema::table('prescription_sale_details', function (Blueprint $table) {
        //     $table->unsignedBigInteger('qty')->default(0)->change();
        //     $table->unsignedBigInteger('price')->default(0)->change();
        //     $table->unsignedBigInteger('tax')->default(0)->change();
        //     $table->unsignedBigInteger('discount')->default(0)->change();
        //     $table->unsignedBigInteger('subtotal')->default(0)->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('prescription_sale_details', function (Blueprint $table) {
        //     $table->unsignedFloat('qty')->default(0)->change();
        //     $table->unsignedFloat('price')->default(0)->change();
        //     $table->unsignedFloat('tax')->default(0)->change();
        //     $table->unsignedFloat('discount')->default(0)->change();
        //     $table->unsignedFloat('subtotal')->default(0)->change();
        // });
    }
};
