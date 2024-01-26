<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factor extends Model
{
    protected $table = 'factors';

    protected $fillable = [
        'course_installments_id',
        'total_amount',
        'amount_paid',
        'status',
        'du_date',
    ];

    public function courseInstallment(): BelongsTo
    {
        return $this->belongsTo(CourseInstallment::class, 'course_installments_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'factors_id');
    }
}
