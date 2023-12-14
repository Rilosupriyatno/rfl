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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id');
            $table->string('code');
            $table->unsignedBigInteger('expeditions_id');
            $table->string('payment_method', 128);
            $table->unsignedBigInteger('discount')->default(0);
            $table->unsignedBigInteger('shipping_cost')->default(0);
            $table->unsignedBigInteger('tax')->default(0);
            $table->unsignedBigInteger('grandtotal')->default(0);
            $table->enum('payment_status', ['paid', 'unpaid', 'canceled'])->default('unpaid');
            // $table->enum('order_status', ['selesai', 'belum selesai', 'canceled'])->default('belum selesai');
            $table->enum('order_status', ['selesai', 'belum selesai', 'shipping', 'canceled', 'pending', 'prosess'])->default('belum selesai');
            $table->string('shipping_name', 128)->nullable();
            $table->timestamps();
            $table->softDeletes(); // mengaktifkan soft deletes pada table
            $table->foreign('buyer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('expeditions_id')->references('id')->on('expeditions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
