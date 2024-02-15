<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalEducationMajor extends Model
{
    use HasFactory;

    protected $fillable = [
        'global_education_degree_id',
        'title',
    ];
}
