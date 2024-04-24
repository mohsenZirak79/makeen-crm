<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Report extends Model
{
    protected $table = 'reports';

    protected $fillable = [
        'course_student_id',
        'date',
        'time',
        'admin_comment',
        'mentor_comment',
        'overall_status',
        'time_status',
    ];

    public function courseStudent(): BelongsTo
    {
        return $this->belongsTo(CourseStudent::class, 'course_student_id');
    }

    public function subReports(): HasMany
    {
        return $this->hasMany(SubReport::class, 'report_id');
    }
}
