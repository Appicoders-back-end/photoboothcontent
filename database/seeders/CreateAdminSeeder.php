<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('role', 'admin')->exists()) {
            User::create([
                'name' => 'Admin',
                'first_name' => 'admin',
                'email' => 'admin@photoboothcontent.com',
                'role' => User::ROLE_ADMIN,
                'password' => Hash::make("123456789"),
                'email_verified_at' => Carbon::now(),
            ]);
        }
    }
}
