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
        // Schema::table('prescription_sales', function (Blueprint $table) {
        //     $table->unsignedFloat('paid')->default(0)->after('tax');
        //     $table->unsignedFloat('change')->default(0)->after('paid');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('prescription_sales', function (Blueprint $table) {
        //     $table->dropColumn('paid');
        //     $table->dropColumn('change');
        // });
    }
};
