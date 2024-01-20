<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubReport extends Model
{
    use HasFactory;
    protected $table = 'sub_reports';

    protected $fillable = [
        'report_id',
        'base_time',
        'edited_time',
        'explanation',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id');
    }
}
