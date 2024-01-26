<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubReport extends Model
{
    protected $table = 'sub_reports';

    protected $fillable = [
        'report_id',
        'base_time',
        'edited_time',
        'explanation',
    ];

    public function report(): BelongsTo
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
