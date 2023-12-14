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
         Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('grade_id')->nullable()->after('category_id');
            // $table->unsignedBigInteger('city_id')->after('grade_id');
            $table->string('rattan_from',128 )->nullable()->after('stock');
            $table->string('unit',218 )->default('kg')->after('stock');
            $table->string('size_max', 128)->nullable()->after('weight');
            $table->string('size_min', 128)->nullable()->after('size_max');
            $table->foreign('grade_id')->references('id')->on('grades')->onDelete('cascade');
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
