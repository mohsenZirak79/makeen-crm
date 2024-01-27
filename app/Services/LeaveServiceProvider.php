<?php

namespace App\Services;

use App\Models\Config;

class LeaveServiceProvider
{
    static public function maxLeaveTime()
    {
        return Config::find('leave_options.max_leave_time')->value;
    }

    static public function noticeBefore24Hours()
    {
        return Config::find('leave_options.notice_before_24_hours')->value;
    }

    static public function noticeDuring24Hours()
    {
        return Config::find('leave_options.notice_during_24_hours')->value;
    }

    static public function withoutNotice()
    {
        return Config::find('leave_options.without_notice')->value;
    }
}