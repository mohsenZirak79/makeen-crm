<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_data_id',
        'address',
        'home_tel',
        'postal_code'
    ];
    public function userData()
    {
        return $this->belongsTo(UserData::class);
    }
}
