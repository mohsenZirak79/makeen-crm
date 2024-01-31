<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ForeignLanguagesData extends Model
{
    use SoftDeletes;

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
