<?php

namespace App\Services;

use App\Models\Config;

class ReportServiceProvider
{
    static public function requiredTime()
    {
        return Config::find('report.required_time')->value;
    }

    static public function penaltyPerHour()
    {
        return Config::find('report.penalty_per_hour')->value;
    }

    static public function baseTime()
    {
        return Config::find('report.base_time')->value;
    }

    static public function lastTime()
    {
        return Config::find('report.last_time')->value;
    }

    static public function lastTimeWithPenalty()
    {
        return Config::find('report.last_time_with_penalty')->value;
    }
}