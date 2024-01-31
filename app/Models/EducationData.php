<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EducationData extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_data_id',
        'diploma',
        'associate_degree',
        'bachelor_degree',
        'master_degree'
    ];
    protected $casts = [
        'diploma' => 'object',
        'associate_degree' => 'object',
        'bachelor_degree' => 'object',
        'master_degree' => 'object'
    ];
    public function userData(): BelongsTo
    {
        return $this->belongsTo(UserData::class);
    }
}
