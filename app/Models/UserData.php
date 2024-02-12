<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserData extends Model
{
    protected $fillable = [
        'user_id',
        'personal_data_id',
        'home_data_id',
        'military_service_data_id',
        'education_data_id',
        'course_data_id',
        'app_experience_data_id',
        'foreign_languages_data_id',
        'representative_data_id'
    ];

    protected $casts = [
        'course_data_id' => 'array',
        'app_experience_data_id' => 'array'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function personalData(): HasOne
    {
        return $this->hasOne(PersonalData::class);
    }

    public function homeData(): HasOne
    {
        return $this->hasOne(HomeData::class);
    }

    public function militaryServiceData(): HasOne
    {
        return $this->hasOne(MilitaryServiceData::class);
    }

    public function educationData(): HasOne
    {
        return $this->hasOne(EducationData::class);
    }

    public function courseData(): HasMany
    {
        return $this->hasMany(CourseData::class);
    }

    public function appExperienceData(): HasMany
    {
        return $this->hasMany(AppExperienceData::class);
    }

    public function foreignLanguagesData(): HasOne
    {
        return $this->hasOne(ForeignLanguagesData::class);
    }

    public function representativeData(): HasOne
    {
        return $this->hasOne(RepresentativeData::class);
    }
}
