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
        //     $table->unsignedBigInteger('medicine_outbound_id')->after('medicine_batch_id');
        //     $table->foreign('medicine_outbound_id')->references('id')->on('medicine_outbounds')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('prescription_sale_details', function (Blueprint $table) {
        //     $table->dropForeign(['medicine_outbound_id']);
        //     $table->dropColumn('medicine_outbound_id');
        // });
    }
};
