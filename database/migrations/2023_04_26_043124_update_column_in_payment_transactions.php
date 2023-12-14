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
        // Schema::table('payment_transactions', function (Blueprint $table) {
        //     $table->unsignedBigInteger('paid')->default(0)->after('grandtotal');
        //     $table->unsignedBigInteger('change')->default(0)->after('paid');
        //     $table->enum('status', ['paid', 'unpaid', 'canceled'])->default('unpaid')->after('change');
        //     $table->enum('transaction_status', ['selesai', 'belum selesai', 'canceled'])->default('belum selesai')->after('change');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('payment_transactions', function (Blueprint $table) {
        //     $table->dropColumn('paid');
        //     $table->dropColumn('change');
        //     $table->dropColumn('status');
        //     $table->dropColumn('transaction_status');
        // });
    }
};
