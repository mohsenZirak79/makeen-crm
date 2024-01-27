<?php

namespace Database\Seeders\Config;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $config = \config('app-config');
        $config = \Arr::dot($config);
        foreach ($config as $key => $value) {
            Config::create(['key' => $key, 'value' => $value]);
        }
    }
}
