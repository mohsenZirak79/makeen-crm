<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_data_id',
        'diploma',
        'associate_degree',
        'bachelor_degree',
        'master_degree'
    ];
    public function userData()
{
    return $this->belongsTo(UserData::class);
}
}
