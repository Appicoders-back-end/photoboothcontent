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
            $table->after('description', function($table){
                $table->enum('status', [\App\Models\Product::ACTIVE, \App\Models\Product::INACTIVE])->default(\App\Models\Product::ACTIVE)->nullable();
                $table->json('related_products')->after('description')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('status');
            $table->dropColumn('related_products');
        });
    }
};
