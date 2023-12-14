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
        Schema::table('shippings', function (Blueprint $table) {
            $table->dropColumn(['shipping_estimate_start', 'shipping_estimate_end', 'shipping_service_detail']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shippings', function (Blueprint $table) {
            //
        });
    }
};