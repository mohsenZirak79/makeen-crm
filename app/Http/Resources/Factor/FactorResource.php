<?php

namespace App\Http\Resources\Factor;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Factor */
class FactorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'total_amount' => $this->total_amount,
            'amount_paid' => $this->amount_paid,
            'status' => $this->status,
            'du_date' => $this->du_date,
            'description' => $this->description,
            'transactions_count' => $this->transactions_count,
        ];
    }
}
