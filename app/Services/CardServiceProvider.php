<?php

namespace App\Services;

use App\Models\Config;

class CardServiceProvider
{
    static public function penaltyCard()
    {
        return Config::find('card.penalty_card')->value;
    }

    static public function installmentCard()
    {
        return Config::find('card.installment_card')->value;
    }

    static public function graduatedCard()
    {
        return Config::find('card.graduated_card')->value;
    }

}