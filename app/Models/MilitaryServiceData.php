<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MilitaryServiceData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_data_id',
        'service_status',
        'service_address'
    ];

    public function userData()
    {
        return $this->belongsTo(UserData::class);
    }
}
