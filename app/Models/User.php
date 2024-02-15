<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'father_name',
        'phone_number',
        'national_id',
        'email',
        'password'
    ];

    protected $dateFormat = 'Y-m-d H:i:s';

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    public function adminData(): HasOne
    {
        return $this->hasOne(AdminData::class);
    }

    public function MentorData(): HasOne
    {
        return $this->hasOne(MentorData::class);
    }

    public function userData(): HasOne
    {
        return $this->hasOne(UserData::class);
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, CourseStudent::class, 'student_id', 'course_id');
    }

    public function teachingCourses(): HasMany
    {
        return $this->hasMany(Course::class, 'mentor_id');
    }

    public function courseStudent(): HasMany
    {
        return $this->hasMany(CourseStudent::class, 'student_id');
    }

    public function leaveRequest(): HasOneThrough|HasManyThrough
    {
        return $this->through('courseStudent')->has('leaveRequests');
    }

    public function mentorWeeklyStudentScore(): HasOneThrough|HasManyThrough
    {
        return $this->through('courseStudent')->has('mentorWeeklyStudentScore');
    }
}
