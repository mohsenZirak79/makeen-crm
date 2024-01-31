<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseData extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_data_id',
        'title',
        'start_date',
        'course_length',
        'academy_name',
        'description',
        'evidence'
    ];

    public function userData(): BelongsTo
    {
        return $this->belongsTo(UserData::class);
    }
}
