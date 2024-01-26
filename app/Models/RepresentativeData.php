<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RepresentativeData extends Model
{
    protected $fillable = [
        'user_data_id',
        'name',
        'acquaintance_duration',
        'relation',
        'info',
        'introduction_method'
    ];

    public function userData(): BelongsTo
    {
        return $this->belongsTo(UserData::class);
    }
}
