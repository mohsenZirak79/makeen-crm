<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MentorData extends Model
{
    protected $fillable = [
        'user_id',
        'work_address',
        'education_degree_id',
        'education_degree_university',
        'representative',
        'skills',
        'work_experience'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
