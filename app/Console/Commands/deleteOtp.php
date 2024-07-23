<?php

namespace App\Console\Commands;

use App\Models\OtpLog;
use Illuminate\Console\Command;

class deleteOtp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-otp';

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
       OtpLog::where('otp_expiry', '<=', now())->delete();
    }
}
