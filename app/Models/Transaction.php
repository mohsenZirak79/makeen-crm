<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'factors_id',
        'amount',
        'status',
    ];

    public function factor()
    {
        return $this->belongsTo(Factor::class, 'factors_id');
    }
}
