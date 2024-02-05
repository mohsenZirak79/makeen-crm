<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = [
        'factors_id',
        'amount',
        'status',
        'details'
    ];

    protected $casts = [
        'details' => 'object',
    ];

    public function factor(): BelongsTo
    {
        return $this->belongsTo(Factor::class, 'factors_id');
    }
}
