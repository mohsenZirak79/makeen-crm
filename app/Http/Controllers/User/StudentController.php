<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StudentCreateEditRequest;
use App\Http\Requests\User\StudentUpdateRequest;
use App\Models\AppExperienceData;
use App\Models\CourseData;
use App\Models\EducationData;
use App\Models\ForeignLanguagesData;
use App\Models\HomeData;
use App\Models\MilitaryServiceData;
use App\Models\PersonalData;
use App\Models\RepresentativeData;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{

    public function create(StudentCreateEditRequest $request)
    {
        $user = User::create([
            'first_name' => $request->user['first_name'],
            'last_name' => $request->user['last_name'],
            'father_name' => $request->user['father_name'],
            'phone_number' => $request->user['phone_number'],
            'national_id' => $request->user['national_id'],
            'email' => $request->user['email'],
            'password' => $request->user['national_id'],
        ]);

        $userData = UserData::create([
            'user_id' => $user->id
        ]);


        $personal_data = PersonalData::create([
            'user_data_id' => $userData->id,
            'birth_place' => $request->personal_data['birth_place'],
            'birth_date' => $request->personal_data['birth_date'],
            'religion' => $request->personal_data['religion'],
            'gender' => $request->personal_data['gender'],
            'is_married' => $request->personal_data['is_married'],
            'child_count' => $request->personal_data['child_count'],
            'mbti' => $request->personal_data['mbti'],
            'parent_phone_number' => $request->personal_data['parent_phone_number'],
            'emergency_phone_number' => $request->personal_data['emergency_phone_number'],
        ]);


        if ($request->home_data) {
            $home_data = HomeData::create([
                'user_data_id' => $userData->id,
                'address' => $request->home_data['address'],
                'home_tel' => $request->home_data['home_tel'],
                'postal_code' => $request->home_data['postal_code'],
            ]);
        }

        if ($request->military_service_data) {
            $military_service_data = MilitaryServiceData::create([
                'user_data_id' => $userData->id,
                'service_status' => $request->military_service_data['service_status'],
                'service_address' => $request->military_service_data['service_address'],
            ]);
        }

        if ($request->education_data) {
            $education_data = EducationData::create([
                'user_data_id' => $userData->id,
                'diploma' => json_encode($request->education_data['diploma']),
                'associate_degree' => json_encode($request->education_data['associate_degree']),
                'bachelor_degree' => json_encode($request->education_data['bachelor_degree']),
                'master_degree' => json_encode($request->education_data['master_degree']),
            ]);
        }

        if ($request->course_data) {
            foreach ($request->course_data as $courseData) {
                $CourseData = CourseData::create([
                    'user_data_id' => $userData->id,
                    'title' => $courseData['title'],
                    'start_date' => $courseData['start_date'],
                    'academy_name' => $courseData['academy_name'],
                    'course_length' => $courseData['course_length'],
                    'description' => $courseData['description_course_data'],
                    'evidence' => $courseData['evidence'],
                ]);
            }
        }

        if ($request->app_experience_data) {
            foreach ($request->app_experience_data as $appExperienceData) {
                $AppExperienceData = AppExperienceData::create([
                    'user_data_id' => $userData->id,
                    'app_name' => $appExperienceData['app_name'],
                    'history' => $appExperienceData['history'],
                    'proficiency' => $appExperienceData['proficiency'],
                    'project' => $appExperienceData['project'],
                    'consideration' => $appExperienceData['consideration'],
                ]);
            }
        }

        if ($request->foreign_languages_data) {
            $ForeignLanguagesData = ForeignLanguagesData::create([
                'user_data_id' => $userData->id,
                'languages_name' => $request->foreign_languages_data['languages_name'],
                'read' => $request->foreign_languages_data['read'],
                'write' => $request->foreign_languages_data['write'],
                'conversation' => $request->foreign_languages_data['conversation'],
                'comprehension' => $request->foreign_languages_data['comprehension'],
                'description' => $request->foreign_languages_data['description_foreign_languages_data'],
            ]);
        }

        if ($request->representative_data) {
            $RepresentativeData = RepresentativeData::create([
                'user_data_id' => $userData->id,
                'name' => $request->representative_data['name'],
                'acquaintance_duration' => $request->representative_data['acquaintance_duration'],
                'relation' => $request->representative_data['relation'],
                'info' => $request->representative_data['info'],
                'introduction_method' => $request->representative_data['introduction_method'],
            ]);
        }

        $userData->update([
            'personal_data_id' => $personal_data->id,
            'home_data_id' => $home_data->id,
            'military_service_data_id' => $military_service_data->id,
            'education_data_id' => $education_data->id,
            'foreign_languages_data_id' => $ForeignLanguagesData->id,
            'representative_data_id' => $RepresentativeData->id,
        ]);

        $user->load(['userData', 'userData.homeData', 'userData.militaryServiceData', 'userData.educationData', 'userData.CourseData', 'userData.AppExperienceData', 'userData.ForeignLanguagesData', 'userData.RepresentativeData']);

        return response()->json([
            'message' => 'user registered successfully.',
            'user' => $user
        ]);
    }

    public function edit(StudentCreateEditRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'father_name' => $request->father_name,
            'phone_number' => $request->phone_number,
            'national_id' => $request->national_id,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $userData = UserData::findOrFail($user->id);

            $personal_data = PersonalData::findOrFail($userData->personal_data_id);
            $personal_data->update([
                'birth_place' => $request->personal_data['birth_place'],
                'birth_date' => $request->personal_data['birth_date'],
                'religion' => $request->personal_data['religion'],
                'gender' => $request->personal_data['gender'],
                'is_married' => $request->personal_data['is_married'],
                'child_count' => $request->personal_data['child_count'],
                'mbti' => $request->personal_data['mbti'],
                'parent_phone_number' => $request->personal_data['parent_phone_number'],
                'emergency_phone_number' => $request->personal_data['emergency_phone_number'],
            ]);


        if ($request->home_data) {
            $home_data = HomeData::findOrFail($userData->home_data_id);
            $home_data->update([
                'address' => $request->home_data['address'],
                'home_tel' => $request->home_data['home_tel'],
                'postal_code' => $request->home_data['postal_code'],
            ]);
        }

        if ($request->military_service_data) {
            $military_service_data = MilitaryServiceData::findOrFail($userData->military_service_data_id);
            $military_service_data->update([
                'service_status' => $request->military_service_data['service_status'],
                'service_address' => $request->military_service_data['service_address'],
            ]);
        }

        if ($request->education_data) {
            $education_data = EducationData::findOrFail($userData->education_data_id);
            $education_data->update([
                'diploma' => json_encode($request->education_data['diploma']),
                'associate_degree' => json_encode($request->education_data['associate_degree']),
                'bachelor_degree' => json_encode($request->education_data['bachelor_degree']),
                'master_degree' => json_encode($request->education_data['master_degree']),
            ]);
        }

        if ($request->course_data) {
            foreach ($request->course_data as $courseId => $courseData) {
                $course_data = CourseData::findOrFail($courseId);
                $course_data->update([
                    'title' => $courseData['title'],
                    'start_date' => $courseData['start_date'],
                    'academy_name' => $courseData['academy_name'],
                    'course_length' => $courseData['course_length'],
                    'description_course_data' => $courseData['description_course_data'],
                    'evidence' => $courseData['evidence'],
                ]);
            }
        }

        if ($request->app_experience_data) {
            foreach ($request->app_experience_data as $appId => $appExperienceData) {
                $app_experience_data = AppExperienceData::findOrFail($appId);
                $app_experience_data->update([
                    'app_name' => $appExperienceData['app_name'],
                    'history' => $appExperienceData['history'],
                    'proficiency' => $appExperienceData['proficiency'],
                    'project' => $appExperienceData['project'],
                    'consideration' => $appExperienceData['consideration'],
                ]);
            }
        }


        if ($request->foreign_languages_data) {
            $foreign_languages_data = ForeignLanguagesData::findOrFail($userData->foreign_languages_data_id);
            $foreign_languages_data->update([
                'languages_name' => $request->foreign_languages_data['languages_name'],
                'read' => $request->foreign_languages_data['read'],
                'write' => $request->foreign_languages_data['write'],
                'conversation' => $request->foreign_languages_data['conversation'],
                'comprehension' => $request->foreign_languages_data['comprehension'],
                'description_foreign_languages_data' => $request->foreign_languages_data['description_foreign_languages_data'],
            ]);
        }

        if ($request->representative_data) {
            $representative_data = RepresentativeData::findOrFail($userData->representative_data_id);
            $representative_data->update([
                'name' => $request->representative_data['name'],
                'acquaintance_duration' => $request->representative_data['acquaintance_duration'],
                'relation' => $request->representative_data['relation'],
                'info' => $request->representative_data['info'],
                'introduction_method' => $request->representative_data['introduction_method'],
            ]);
        }

        $userData->update([
            'personal_data_id' => $personal_data->id,
            'home_data_id' => $home_data->id,
            'military_service_data_id' => $military_service_data->id,
            'education_data_id' => $education_data->id,
            'foreign_languages_data_id' => $foreign_languages_data->id,
            'representative_data_id' => $representative_data->id,
        ]);

        $user->load([
            'userData',
            'userData.homeData',
            'userData.militaryServiceData',
            'userData.educationData',
            'userData.CourseData',
            'userData.AppExperienceData',
            'userData.ForeignLanguagesData',
            'userData.RepresentativeData'
        ]);

        return response()->json([
            'message' => 'User edited successfully.',
            'user' => $user
        ]);
    }

    public function update(StudentUpdateRequest $request)
    {
        $user = Auth::user();
        $userData = $user->userData;

        if ($request->home_data) {
            $home_data = HomeData::findOrFail($userData->home_data_id);
            $home_data->update([
                'address' => $request->home_data['address'],
                'home_tel' => $request->home_data['home_tel'],
                'postal_code' => $request->home_data['postal_code'],
            ]);
        }

        if ($request->military_service_data) {
            $military_service_data = MilitaryServiceData::findOrFail($userData->military_service_data_id);
            $military_service_data->update([
                'service_status' => $request->military_service_data['service_status'],
                'service_address' => $request->military_service_data['service_address'],
            ]);
        }

        if ($request->education_data) {
            $education_data = EducationData::findOrFail($userData->education_data_id);
            $education_data->update([
                'diploma' => json_encode($request->education_data['diploma']),
                'associate_degree' => json_encode($request->education_data['associate_degree']),
                'bachelor_degree' => json_encode($request->education_data['bachelor_degree']),
                'master_degree' => json_encode($request->education_data['master_degree']),
            ]);
        }

        if ($request->course_data) {
            foreach ($request->course_data as $courseId => $courseData) {
                $course_data = CourseData::findOrFail($courseId);
                $course_data->update([
                    'title' => $courseData['title'],
                    'start_date' => $courseData['start_date'],
                    'academy_name' => $courseData['academy_name'],
                    'course_length' => $courseData['course_length'],
                    'description_course_data' => $courseData['description_course_data'],
                    'evidence' => $courseData['evidence'],
                ]);
            }
        }

        if ($request->app_experience_data) {
            foreach ($request->app_experience_data as $appId => $appExperienceData) {
                $app_experience_data = AppExperienceData::findOrFail($appId);
                $app_experience_data->update([
                    'app_name' => $appExperienceData['app_name'],
                    'history' => $appExperienceData['history'],
                    'proficiency' => $appExperienceData['proficiency'],
                    'project' => $appExperienceData['project'],
                    'consideration' => $appExperienceData['consideration'],
                ]);
            }
        }

        if ($request->foreign_languages_data) {
            $foreign_languages_data = ForeignLanguagesData::findOrFail($userData->foreign_languages_data_id);
            $foreign_languages_data->update([
                'languages_name' => $request->foreign_languages_data['languages_name'],
                'read' => $request->foreign_languages_data['read'],
                'write' => $request->foreign_languages_data['write'],
                'conversation' => $request->foreign_languages_data['conversation'],
                'comprehension' => $request->foreign_languages_data['comprehension'],
                'description_foreign_languages_data' => $request->foreign_languages_data['description_foreign_languages_data'],
            ]);
        }

        if ($request->representative_data) {
            $representative_data = RepresentativeData::findOrFail($userData->representative_data_id);
            $representative_data->update([
                'name' => $request->representative_data['name'],
                'acquaintance_duration' => $request->representative_data['acquaintance_duration'],
                'relation' => $request->representative_data['relation'],
                'info' => $request->representative_data['info'],
                'introduction_method' => $request->representative_data['introduction_method'],
            ]);
        }

        $userData->update([
            'home_data_id' => $home_data->id ?? null,
            'military_service_data_id' => $military_service_data->id ?? null,
            'education_data_id' => $education_data->id ?? null,
            'foreign_languages_data_id' => $foreign_languages_data->id ?? null,
            'representative_data_id' => $representative_data->id ?? null,
        ]);

        $user->load([
            'userData',
            'userData.homeData',
            'userData.militaryServiceData',
            'userData.educationData',
            'userData.CourseData',
            'userData.AppExperienceData',
            'userData.ForeignLanguagesData',
            'userData.RepresentativeData'
        ]);

        return response()->json([
            'message' => 'User data updated successfully.',
            'user' => $user,
        ]);
    }

    public function show($id)
    {
        $user = User::with(['userData', 'userData.homeData', 'userData.militaryServiceData', 'userData.educationData', 'userData.CourseData', 'userData.AppExperienceData', 'userData.ForeignLanguagesData', 'userData.RepresentativeData'])->findOrFail($id);

        return response()->json([
            'user' => $user
        ]);
    }

    public function delete($id)
    {
        try {
            $user = User::with(['userData', 'userData.homeData', 'userData.militaryServiceData', 'userData.educationData', 'userData.CourseData', 'userData.AppExperienceData', 'userData.ForeignLanguagesData', 'userData.RepresentativeData'])->findOrFail($id);

            $user->delete();

            return response()->json([
                'message' => 'User deleted successfully.'
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'The desired user was not found.'], 404);
        }
    }

}
