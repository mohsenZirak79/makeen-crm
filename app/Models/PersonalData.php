<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PersonalData extends Model
{
    protected $fillable = [
        'user_data_id',
        'birth_place',
        'birth_date',
        'religion',
        'gender',
        'is_married',
        'child_count',
        'mbti',
        'parent_phone_number',
        'emergency_phone_number'
    ];

    public function userData(): BelongsTo
    {
        return $this->belongsTo(UserData::class);
    }
}
