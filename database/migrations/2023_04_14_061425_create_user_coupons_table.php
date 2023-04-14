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
        Schema::create('user_coupons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('subscription_id')->nullable()->comment("if coupon purchased via subscription");
            $table->string('stripe_charge_id', 100)->nullable()->comment("if coupon purchased without subscription");
            $table->string('code', 20)->nullable();
            $table->decimal('price')->nullable();
            $table->integer('total_videos')->default(0);
            $table->integer('downloaded_videos')->default(0);
            $table->integer('total_images')->default(0);
            $table->integer('downloaded_images')->default(0);
            $table->integer('total_documents')->default(0);
            $table->integer('downloaded_documents')->default(0);
            $table->integer('total_audio')->default(0);
            $table->integer('downloaded_audio')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_coupons');
    }
};
