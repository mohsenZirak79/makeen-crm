<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;


    protected $table = 'courses';

    protected $fillable = [
        'sub_category_id',
        'course_number',
        'mentor_id',
        'student_count',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function courseStudents()
    {
        return $this->hasMany(CourseStudent::class, 'course_id');
    }
    public function courseDays()
    {
        return $this->hasMany(CourseDay::class, 'course_id');
    }
}
