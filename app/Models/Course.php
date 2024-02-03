<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Course extends Model
{


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

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function mentor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'sub_category_id');
    }

    public function courseInstallments(): HasManyThrough
    {
        return $this->hasManyThrough(CourseInstallment::class, CourseStudent::class, 'course_id', 'course_student_id');
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(User::class, CourseStudent::class, 'course_id', 'student_id');
    }

    public function classrooms(): BelongsToMany
    {
        return $this->belongsToMany(Classroom::class, 'course_days');
    }
}
