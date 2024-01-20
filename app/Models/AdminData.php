<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'work_position',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
