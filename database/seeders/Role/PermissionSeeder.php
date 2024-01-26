<?php

namespace Database\Seeders\Role;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // user
            'user.index',
            'user.show',
            'user.store',
            'user.update',
            'user.destroy',
            
        ];
    }
}
