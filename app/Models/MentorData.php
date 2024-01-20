<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'work_address',
        'education_degree_id',
        'education_degree_university',
        'representative',
        'skills',
        'work_experience'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
