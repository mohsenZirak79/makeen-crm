<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;

    protected $table = 'factors';

    protected $fillable = [
        'course_installments_id',
        'total_amount',
        'amount_paid',
        'status',
        'du_date',
    ];

    public function courseInstallment()
    {
        return $this->belongsTo(CourseInstallment::class, 'course_installments_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'factors_id');
    }
}
