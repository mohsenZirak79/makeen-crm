<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EducationData extends Model
{
    protected $fillable = [
        'user_data_id',
        'diploma',
        'associate_degree',
        'bachelor_degree',
        'master_degree'
    ];

    public function userData(): BelongsTo
    {
        return $this->belongsTo(UserData::class);
    }
}
