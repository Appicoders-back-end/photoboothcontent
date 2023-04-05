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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150)->nullable();
            $table->string('stripe_plan_id')->nullable();
            $table->string('stripe_product_id')->nullable();
            $table->double('price')->nullable();
            $table->enum('interval_time', ['week', 'month', 'year'])->nullable();
            $table->text('description')->nullable();
            $table->integer('coupons')->default('0')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
