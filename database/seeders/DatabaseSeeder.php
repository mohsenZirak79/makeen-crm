<?php

namespace Database\Seeders;

use Database\Seeders\Config\ConfigSeeder;
use Database\Seeders\Role\PermissionSeeder;
use Database\Seeders\Role\RoleSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            ConfigSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            SuperAdminSeeder::class,
            UserSeeder::class,
        ]);
    }
}
