<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseStudent extends Pivot
{
    public $incrementing = true;
    protected $table = 'course_students';
    protected $foreignKey = 'course_id';
    protected $relatedKey = 'student_id';

    protected $fillable = [
        'student_id',
        'course_id',
        'student_status',
        'is_supplement',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function installment(): HasOne
    {
        return $this->hasOne(CourseInstallment::class, 'course_student_id');
    }

    public function leaveRequests(): HasMany
    {
        return $this->hasMany(LeaveRequest::class, 'course_student_id');
    }

    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'course_student_id');
    }

    public function mentorWeeklyStudentScore(): HasMany
    {
        return $this->hasMany(MentorWeeklyStudentScore::class, 'course_student_id');
    }
}
