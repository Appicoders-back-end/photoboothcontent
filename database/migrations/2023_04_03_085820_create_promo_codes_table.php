<?php

use App\Models\PromoCode;
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
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->enum('type', array([PromoCode::FIXED, PromoCode::PERCENTAGE]))->default(PromoCode::FIXED);
            $table->decimal('amount')->nullable();
            $table->enum('status', array([PromoCode::ACTIVE, PromoCode::INACTIVE]))->default(PromoCode::INACTIVE);
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_codes');
    }
};
