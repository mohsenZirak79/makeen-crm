<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Transaction extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

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
