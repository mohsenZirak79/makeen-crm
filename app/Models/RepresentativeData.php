<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentativeData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_data_id',
        'name',
        'acquaintance_duration',
        'relation',
        'info',
        'introduction_method'
    ];

    public function userData()
    {
        return $this->belongsTo(UserData::class);
    }
}
