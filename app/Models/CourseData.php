<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_data_id',
        'title',
        'start_date',
        'course_length',
        'academy name',
        'description'
    ];
    public function userData()
{
    return $this->belongsTo(UserData::class);
}
}
