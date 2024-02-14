<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class MentorCreateEditRequest extends FormRequest
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
            'first_name' => 'required | string | max:255',
            'last_name' => 'required | string | max:255',
            'father_name' => 'nullable | string | max:255',
            'phone_number' => 'required | string | max:12',
            'national_id' => 'required  | max:11',
            'work_address' => 'required | string | max:255',
            'global_education_degree_id' => 'required | integer',
            'global_education_major_id' => 'required | integer',
            'representative' => 'required | string | max:255',
            'skills' => 'required | array',
            'skills.*' => 'string | max:255',
            'work_experience' => 'required | array',
            'work_experience.*' => 'string | max:255',
        ];
    }
}
