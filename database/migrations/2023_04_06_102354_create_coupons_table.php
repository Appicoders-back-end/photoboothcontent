<?php

use App\Models\Coupon;
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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->decimal('price')->nullable();
            $table->integer('number_of_audio')->default(0);
            $table->integer('number_of_video')->default(0);
            $table->integer('number_of_images')->default(0);
            $table->integer('number_of_documents')->default(0);
            $table->enum('status', array([Coupon::ACTIVE, Coupon::INACTIVE]))->default(Coupon::INACTIVE);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
