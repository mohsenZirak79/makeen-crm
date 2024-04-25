<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'first_name' => 'mohamad',
            'last_name' => 'sadeghikia',
            'phone_number' => '09120000000',
            'national_id' => '12356789',
            'email' => 'sadeghikia@gmail.com',
            'password' => Hash::make('1234'),
        ]);
        $user->assignRole('super_admin');
    }
}
