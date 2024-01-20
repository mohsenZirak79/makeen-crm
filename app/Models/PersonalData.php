<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalData extends Model
{
    use HasFactory;

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

    public function userData()
    {
        return $this->belongsTo(UserData::class);
    }
}
