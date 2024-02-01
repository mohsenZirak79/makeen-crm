<?php

namespace Database\Seeders;

use Database\Seeders\Config\ConfigSeeder;
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
            UserSeeder::class,
        ]);
    }
}
