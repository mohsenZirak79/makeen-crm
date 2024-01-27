<?php

namespace App\Http\Resources\Config;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ConfigResource extends JsonResource
{
    public function __construct()
    {
        parent::__construct([]);
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Report' => [
                'required_time' => configServiceProvider()->report()->requiredTime(),
                'penalty_per_hour' => configServiceProvider()->report()->penaltyPerHour(),
                'base_time' => configServiceProvider()->report()->baseTime(),
                'last_time' => configServiceProvider()->report()->lastTime(),
                'last_time_with_penalty' => configServiceProvider()->report()->lastTimeWithPenalty(),
            ],
            'Card' => [
                'penalty_card' => configServiceProvider()->card()->penaltyCard(),
                'installment_card' => configServiceProvider()->card()->installmentCard(),
                'graduated_card' => configServiceProvider()->card()->graduatedCard(),
            ],
            'Performance_over_view' => configServiceProvider()->performanceOverView(),
            'Leave_rules' => configServiceProvider()->leaveRules(),
            'Leave_options' => [
                'max_leave_time' => configServiceProvider()->leaveOptions()->maxLeaveTime(),
                'notice_before_24_hours' => configServiceProvider()->leaveOptions()->noticeBefore24Hours(),
                'notice_during_24_hours' => configServiceProvider()->leaveOptions()->noticeDuring24Hours(),
                'without_notice' => configServiceProvider()->leaveOptions()->withoutNotice(),
            ]
        ];
    }
}
