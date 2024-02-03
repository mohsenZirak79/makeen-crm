<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class CourseInstallment extends Model
{

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

    protected $casts = [
        'after_course_installment_start' => 'date',
    ];

    public function billable(): MorphMany
    {
        return $this->morphMany(Factor::class, 'billable');
    }

    public function courseStudent(): BelongsTo
    {
        return $this->belongsTo(CourseStudent::class, 'course_student_id');
    }

    public function factors(): HasMany
    {
        return $this->hasMany(Factor::class, 'course_installments_id');
    }
}
