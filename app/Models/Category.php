<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'topic_id',
    ];

    public function topic()
    {
        return $this->belongsTo(Category::class, 'topic_id');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'topic_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'sub_category_id');
    }
}
