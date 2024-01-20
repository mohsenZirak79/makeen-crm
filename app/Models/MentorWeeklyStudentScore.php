<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorWeeklyStudentScore extends Model
{
    use HasFactory;

    protected $table = 'mentor_weekly_student_score';

    protected $fillable = [
        'course_student_id',
        'technical_score',
        'week_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'course_student_id');
    }
}
