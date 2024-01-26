<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'topic_id',
    ];

    public function topic(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'topic_id');
    }

    public function subcategories(): HasMany
    {
        return $this->hasMany(Category::class, 'topic_id');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class, 'sub_category_id');
    }
}
