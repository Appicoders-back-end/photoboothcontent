<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('name', function ($table) {
                $table->string('first_name', 150)->nullable();
                $table->string('last_name', 150)->nullable();
            });
            $table->after('email', function ($table) {
                $table->enum('role', [User::ROLE_ADMIN, User::ROLE_CUSTOMER]);
                $table->string('contact_no', 25)->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('role');
            $table->dropColumn('contact_no');
        });
    }
};
