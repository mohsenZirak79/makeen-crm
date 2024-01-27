<?php


return [
    'report' => [
        'required_time' => '8',
        'penalty_per_hour' => '10000',
        'base_time' => '22:00',
        'last_time' => '22:15',
        'last_time_with_penalty' => '22:30',
    ],
    'card' => [
        'penalty_card' => 'شماره کارت جریمه',
        'installment_card' => 'شماره کارت قسط',
        'graduated_card' => 'شماره کارت فاغ التحصیلان'
    ],
    'performance_over_view' => '7',
    'leave_rules' => 'rules',
    'leave_options' => [
        'max_leave_time' => '16',
        'notice_before_24_hours' => '1',
        'notice_during_24_hours' => '1.1',
        'without_notice' => '1.2'
    ]
];
