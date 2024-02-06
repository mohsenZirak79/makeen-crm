<?php

namespace App\Http\Resources\Transaction;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'amount' => $this->amount,
            'details' => $this->details,
            'status' => $this->status,
            'image' => $this->getFirstMediaUrl('transaction'),
            'user' => $this->factor->user(),
            'factor' => $this->factor,
        ];
    }
}
