<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StudentUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'home_data.address' => 'nullable|string',
            'home_data.home_tel' => 'nullable|string',
            'home_data.postal_code' => 'nullable|numeric',

            'military_service_data.service_status' => 'nullable|string',

            'education_data.diploma.field_of_study' => 'nullable|string',
            'education_data.diploma.orientation' => 'nullable|string',
            'education_data.diploma.start' => 'nullable|date',
            'education_data.diploma.end' => 'nullable|date',
            'education_data.diploma.total_average' => 'nullable|numeric',
            'education_data.diploma.university' => 'nullable|string',
            'education_data.diploma.city_of_education' => 'nullable|string',

            'education_data.associate_degree.field_of_study' => 'nullable|string',
            'education_data.associate_degree.orientation' => 'nullable|string',
            'education_data.associate_degree.start' => 'nullable|date',
            'education_data.associate_degree.end' => 'nullable|date',
            'education_data.associate_degree.total_average' => 'nullable|numeric',
            'education_data.associate_degree.university' => 'nullable|string',
            'education_data.associate_degree.city_of_education' => 'nullable|string',

            'education_data.bachelor_degree.field_of_study' => 'nullable|string',
            'education_data.bachelor_degree.orientation' => 'nullable|string',
            'education_data.bachelor_degree.start' => 'nullable|date',
            'education_data.bachelor_degree.end' => 'nullable|date',
            'education_data.bachelor_degree.total_average' => 'nullable|numeric',
            'education_data.bachelor_degree.university' => 'nullable|string',
            'education_data.bachelor_degree.city_of_education' => 'nullable|string',

            'education_data.master_degree.field_of_study' => 'nullable|string',
            'education_data.master_degree.orientation' => 'nullable|string',
            'education_data.master_degree.start' => 'nullable|date',
            'education_data.master_degree.end' => 'nullable|date',
            'education_data.master_degree.total_average' => 'nullable|numeric',
            'education_data.master_degree.university' => 'nullable|string',
            'education_data.master_degree.city_of_education' => 'nullable|string',

            'course_data.*.title' => 'nullable|string',
            'course_data.*.start_date' => 'nullable|date',
            'course_data.*.course_length' => 'nullable|numeric',
            'course_data.*.academy_name' => 'nullable|string',
            'course_data.*.description_course_data' => 'nullable|string',
            'course_data.*.evidence' => 'nullable|boolean',

            'app_experience_data.*.app_name' => 'nullable|string',
            'app_experience_data.*.history' => 'nullable|numeric',
            'app_experience_data.*.proficiency' => 'nullable|string',
            'app_experience_data.*.project' => 'nullable|boolean',
            'app_experience_data.*.consideration' => 'nullable|string',

            'foreign_languages_data.languages_name' => 'nullable|string',
            'foreign_languages_data.read' => 'nullable|string',
            'foreign_languages_data.write' => 'nullable|string',
            'foreign_languages_data.conversation' => 'nullable|string',
            'foreign_languages_data.comprehension' => 'nullable|string',
            'foreign_languages_data.description_foreign_languages_data' => 'nullable|string',

            'representative_data.name' => 'nullable|string',
            'representative_data.acquaintance_duration' => 'nullable|numeric',
            'representative_data.relation' => 'nullable|string',
            'representative_data.info' => 'nullable|string',
            'representative_data.introduction_method' => 'nullable|string',
        ];
    }
}
