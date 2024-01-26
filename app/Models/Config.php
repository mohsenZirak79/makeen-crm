<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = [
        'value',
        'key'
    ];
    public $timestamps = false;
    protected $primaryKey = 'key';
}
