<?php

namespace App\Services\FactorMaker;

use App\Models\Factor;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BaseFactorMaker extends FactorMaker
{
    protected function makeFactor(Model $model, int $total_amount, Carbon $carbon, string $description = null, int $amount_paid = 0, string $status = 'close'): ?Factor
    {
        if ($this->checkMorphRelation($model)) {
            $factor = new Factor();
            $factor->total_amount = $total_amount;
            $factor->amount_paid = $amount_paid;
            $factor->status = $status;
            $factor->du_date = $carbon;
            $factor->description = $description;
            $model->billable()->save($factor);
            return $factor;
        } else {
            return null;
        }
    }
}
