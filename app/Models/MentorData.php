<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class MentorData extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'work_address',
        'education_degree',
        'education_degree_university',
        'representative',
        'skills',
        'work_experience'
    ];

    protected $casts = [
        'skills',
        'work_experience'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
