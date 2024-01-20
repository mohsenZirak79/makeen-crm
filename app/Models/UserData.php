<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function personalData()
    {
        return $this->hasOne(PersonalData::class);
    }

    public function homedata()
    {
        return $this->hasOne(HomeData::class);
    }

    public function militaryServiceData()
    {
        return $this->hasOne(MilitaryServiceData::class);
    }

    public function educationData()
    {
        return $this->hasOne(EducationData::class);
    }

    public function courseData()
    {
        return $this->hasOne(CourseData::class);
    }

    public function appExperienceData()
    {
        return $this->hasOne(AppExperienceData::class);
    }

    public function foreignLanguagesData()
    {
        return $this->hasOne(ForeignLanguagesData::class);
    }

    public function representativeData()
    {
        return $this->hasOne(RepresentativeData::class);
    }
}
