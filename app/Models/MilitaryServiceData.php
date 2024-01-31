<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MilitaryServiceData extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_data_id',
        'service_status',
        'service_address'
    ];

    public function userData(): BelongsTo
    {
        return $this->belongsTo(UserData::class);
    }
}
