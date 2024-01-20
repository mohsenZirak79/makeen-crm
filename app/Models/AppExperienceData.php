<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppExperienceData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_data_id',
        'app_name',
        'history',
        'proficiency',
        'project',
        'consideration'
    ];
    public function userData()
{
    return $this->belongsTo(UserData::class);
}
}
