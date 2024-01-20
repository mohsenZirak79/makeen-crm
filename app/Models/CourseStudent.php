<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudent extends Model
{
    use HasFactory;
    protected $table = 'course_students';

    protected $fillable = [
        'student_id',
        'course_id',
        'student_status',
        'is_supplement',
        'installment_data_id',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function courseInstallment()
    {
        return $this->hasOne(CourseInstallment::class, 'installment_data_id');
    }
    public function leaveRequests()
    {
        return $this->hasMany(LeaveRequest::class, 'course_student_id');
    }
    public function reports()
    {
        return $this->hasMany(Report::class, 'course_student_id');
    }
}
