<?php

namespace App\Services;

use App\Models\Config;

class ConfigServiceProvider
{
    public function report(): ReportServiceProvider
    {
        return new ReportServiceProvider();
    }

    public function card(): CardServiceProvider
    {
        return new CardServiceProvider();
    }

    public function performanceOverView()
    {
        return Config::find('performance_over_view')->value;
    }

    public function leaveRules()
    {
        return Config::find('leave_rules')->value;
    }

    public function leaveOptions(): LeaveServiceProvider
    {
        return new LeaveServiceProvider();
    }
}