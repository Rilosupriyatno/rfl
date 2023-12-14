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
        //     $table->dropColumn('discount');
        //     $table->enum('payment_method', ['cash', 'cod'])->after('date');
        //     $table->enum('status', ['paid', 'unpaid'])->default('unpaid')->after('grandtotal');
        //     $table->enum('transaction_status', ['selesai', 'proses'])->default('proses')->after('status');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('prescription_sales', function (Blueprint $table) {
        //     $table->unsignedFloat('discount')->after('date');
        //     $table->dropColumn('payment_method');
        //     $table->dropColumn('status');
        //     $table->dropColumn('transaction_status');
        // });
    }
};
