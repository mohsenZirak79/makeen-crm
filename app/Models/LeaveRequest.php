<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class LeaveRequest extends Model
{
    use HasFactory;

    protected $table = 'leave_requests';

    protected $fillable = [
        'course_student_id',
        'status',
        'requested_date',
        'start_time',
        'requested_time',
        'description',
        'admin_comment',
    ];

    public function courseStudent(): BelongsTo
    {
        return $this->belongsTo(CourseStudent::class, 'course_student_id');
    }

    public function user(): HasOneThrough|HasManyThrough
    {
        return $this->through('courseStudent')->has('student');
    }
}
