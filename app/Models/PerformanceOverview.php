<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceOverview extends Model
{
    use HasFactory;
    protected $table = 'performance_overviews';

    protected $fillable = [
        'course_student_id',
        'start_date',
        'end_date',
        'technical_score',
        'attendance_score',
        'reporting_score',
        'System_compatibility',
        'admin_comment',
        'mentor_comment',
        'is_visible_for_user',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'course_student_id');
    }
}
