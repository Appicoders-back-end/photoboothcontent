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
        Schema::table('orders', function (Blueprint $table) {
            $table->text('address')->nullable()->after("total_amount");
            $table->text('other_instruction')->nullable()->after("total_amount");
            $table->string('phone_number')->nullable()->after("total_amount");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('other_instruction');
            $table->dropColumn('phone_number');
        });
    }
};
