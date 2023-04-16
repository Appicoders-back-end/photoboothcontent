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
        Schema::table('user_coupons', function (Blueprint $table) {
            $table->after('price', function ($table) {
                $table->decimal('actual_price')->comment('The actual price before discount')->nullable();
                $table->decimal('discount')->comment('The discounted amount')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_coupons', function (Blueprint $table) {
            $table->dropColumn('actual_price');
            $table->dropColumn('discount');
        });
    }
};
