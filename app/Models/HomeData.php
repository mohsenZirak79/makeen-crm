<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeData extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_data_id',
        'address',
        'home_tel',
        'postal_code'
    ];

    public function userData(): BelongsTo
    {
        return $this->belongsTo(UserData::class);
    }
}
