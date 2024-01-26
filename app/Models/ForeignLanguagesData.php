<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ForeignLanguagesData extends Model
{
    protected $fillable = [
        'user_data_id',
        'languages_name',
        'read',
        'write',
        'conversation',
        'comprehension',
        'description'
    ];

    public function userData(): BelongsTo
    {
        return $this->belongsTo(UserData::class);
    }
}
