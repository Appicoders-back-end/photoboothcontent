<?php

use App\Models\Order;
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
            $table->string('order_no')->nullable()->after('promo_code_id');
            $table->enum('status', array([Order::PENDING, Order::PROCESSING , Order::COMPLETED , Order::CANCEL]))->default(Order::PENDING)->after('paid_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('order_no');
            $table->dropColumn('status');
        });
    }
};
