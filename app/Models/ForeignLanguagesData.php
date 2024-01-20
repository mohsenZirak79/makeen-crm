<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForeignLanguagesData extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_data_id',
        'languages_name',
        'read',
        'write',
        'conversation',
        'comprehension',
        'description'
    ];
    public function userData()
    {
        return $this->belongsTo(UserData::class);
    }
}
