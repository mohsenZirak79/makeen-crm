<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factor extends Model
{
    use SoftDeletes;

    protected $table = 'factors';

    protected $fillable = [
        'total_amount',
        'amount_paid',
        'status',
        'du_date',
    ];

    protected $casts = [
        'du_date' => 'date',
    ];

    public function amountPaid(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->transactions()->where('status', '')->sum('amount')
        );
    }

    public function billable(): MorphTo
    {
        return $this->morphTo('billable');
    }

    public function user(): ?User
    {
        if (isset($this->billable)) {
            if (is_a($this->billable, User::class)) {
                return $this->billable;
            } elseif (is_a($this->billable, CourseStudent::class)) {
                return $this->billable->student;
            } elseif (is_a($this->billable, CourseInstallment::class)) {
                return $this->billable->courseStudent->student;
            }
        }
        return null;
    }

    public function courseInstallment(): BelongsTo
    {
        return $this->belongsTo(CourseInstallment::class, 'course_installments_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'factors_id');
    }
}
