<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class MentorWeeklyStudentScore extends Model
{
    use HasFactory;

    protected $table = 'mentor_weekly_student_score';

    protected $fillable = [
        'course_student_id',
        'technical_score',
        'week_number',
    ];

    public function courseStudent(): BelongsTo
    {
        return $this->belongsTo(CourseStudent::class, 'course_student_id');
    }

    public function user(): HasOneThrough|HasManyThrough
    {
        return $this->through('courseStudent')->has('student');
    }

    public function course(): HasOneThrough|HasManyThrough
    {
        return $this->through('courseStudent')->has('course');
    }
}
