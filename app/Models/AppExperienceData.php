<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AppExperienceData extends Model
{

    protected $fillable = [
        'user_data_id',
        'app_name',
        'history',
        'proficiency',
        'project',
        'consideration'
    ];

    public function userData(): BelongsTo
    {
        return $this->belongsTo(UserData::class);
    }
}
