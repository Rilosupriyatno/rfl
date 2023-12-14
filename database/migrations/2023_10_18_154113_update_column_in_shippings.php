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
            $table->unsignedBigInteger('order_detail_id')->after('id');
            $table->renameColumn('name', 'shipping_name');
            $table->renameColumn('no_resi', 'shipping_number');
            $table->renameColumn('seller_address', 'shipping_address');
            $table->renameColumn('buyer_address', 'billing_address');
            $table->renameColumn('weight_total', 'shipping_weight');
            $table->bigInteger('shipping_fee')->after('weight_total');
            $table->foreign('order_detail_id')->references('id')->on('order_details')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_details', function (Blueprint $table) {
            //
        });
    }
};