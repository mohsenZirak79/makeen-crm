<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';

    protected $fillable = [
        'course_student_id',
        'date',
        'admin_comment',
        'mentor_comment',
        'overall_status',
        'time_status',
    ];

    public function courseStudent()
    {
        return $this->belongsTo(CourseStudent::class, 'course_student_id');
    }

    public function subReports()
    {
        return $this->hasMany(SubReport::class, 'report_id');
    }
}
