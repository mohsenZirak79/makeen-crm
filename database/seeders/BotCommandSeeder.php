<?php

namespace Database\Seeders;

use App\Models\Bot_command;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BotCommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bot_command::create([
            'command'=>'/start'
        ]);
    }
}
