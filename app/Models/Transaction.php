<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;
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
