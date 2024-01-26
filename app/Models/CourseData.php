<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseData extends Model
{

    protected $fillable = [
        'user_data_id',
        'title',
        'start_date',
        'course_length',
        'academy name',
        'description'
    ];

    public function userData(): BelongsTo
    {
        return $this->belongsTo(UserData::class);
    }
}
