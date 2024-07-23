<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class DeleteToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-token';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'success';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        DB::table('personal_reset_password_tokens')->delete();
    }
}
