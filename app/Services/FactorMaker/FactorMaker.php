<?php

namespace App\Services\FactorMaker;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

abstract class FactorMaker
{
    /**
     * @param Model $model billable model
     * @param int $total_amount factor total amount
     * @param Carbon $carbon factor due date
     * @param string $description factor description
     * @param int $amount_paid amount paid
     * @param string $status factor status
     */
    abstract protected function makeFactor(Model $model, int $total_amount, Carbon $carbon, string $description, int $amount_paid, string $status);

    protected function checkMorphRelation(Model $model): bool
    {
        return method_exists($model, 'billable');
    }
}
