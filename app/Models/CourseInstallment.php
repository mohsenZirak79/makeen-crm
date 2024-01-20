<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseInstallment extends Model
{
    use HasFactory;

    protected $table = 'course_installments';

    protected $fillable = [
        'course_student_id',
        'tuition',
        'during_course_installment_count',
        'during_course_installment_amount',
        'after_course_installment_count',
        'after_course_installment_amount',
        'after_course_installment_start',
    ];

    public function courseStudent()
    {
        return $this->belongsTo(CourseStudent::class, 'course_student_id');
    }
    public function factors()
    {
        return $this->hasMany(Factor::class, 'course_installments_id');
    }
}
