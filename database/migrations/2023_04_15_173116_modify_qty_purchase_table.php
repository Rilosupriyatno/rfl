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
        // Schema::table('purchase_details', function (Blueprint $table) {
        //     $table->unsignedBigInteger('qty')->change();
        //     $table->unsignedBigInteger('price')->change();
        //     $table->unsignedBigInteger('tax')->change();
        //     $table->unsignedBigInteger('discount')->change();
        //     $table->unsignedBigInteger('subtotal')->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('purchase_details', function (Blueprint $table) {
        //     $table->unsignedFloat('qty');
        //     $table->unsignedFloat('price');
        //     $table->unsignedFloat('tax');
        //     $table->unsignedFloat('discount');
        //     $table->unsignedFloat('subtotal');
        // });
    }
};
