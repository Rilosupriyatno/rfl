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
        // Schema::create('purchases', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('supplier_id');
        //     $table->string('code', 128);
        //     $table->date('date');
        //     $table->date('due_date');
        //     $table->date('receipt_date')->nullable('true')->default(null);
        //     $table->enum('payment_method', ['cash', 'tempo', 'cod']);
        //     $table->unsignedFloat('tax')->default(0);
        //     $table->unsignedFloat('paid')->default(0);
        //     $table->unsignedFloat('remaining')->default(0);
        //     $table->unsignedFloat('grandtotal')->default(0)->nullable(true);
        //     $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
        //     $table->enum('transaction_status', ['selesai', 'proses'])->default('proses');
        //     $table->enum('receiption_status', ['diterima', 'menunggu'])->default('menunggu');
        //     $table->timestamps();
        //     $table->softDeletes();
        //     $table->foreign('supplier_id')->references('id')->on('medicine_suppliers')->onDelete('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase');
    }
};
