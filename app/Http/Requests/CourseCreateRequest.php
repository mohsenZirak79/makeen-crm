<?php

namespace App\Http\Requests;

use App\Rules\IsMentor;
use App\Rules\IsStudent;
use Illuminate\Foundation\Http\FormRequest;

class CourseCreateRequest extends FormRequest
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
            'sub_category_id' => 'required|exists:categories,id',
            'course_number' => 'required|unique:courses,course_number,NULL,id,sub_category_id,' . $this->sub_category_id,
            'mentor_id' => ['required', 'exists:users,id',new IsMentor()],
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'students.*.student_id' => ['required', 'exists:users,id',new IsStudent()],
            'students.*.installment_data' => 'required|array',
            'students.*.installment_data.during_course_installment_count' => 'required|integer',
            'students.*.installment_data.during_course_installment_amount' => 'required|numeric',
            'students.*.installment_data.after_course_installment_count' => 'required|integer',
            'students.*.installment_data.after_course_installment_amount' => 'required|numeric',
            'students.*.installment_data.start_date' => 'required|date',
            'students.*.installment_data.end_date' => 'required|date|after_or_equal:students.*.installment_data.start_date',
            'course_days.*.week_day' => 'required|integer|in:1,2,3,4,5,6,7',
            'course_days.*.start_time' => 'required|date_format:H:i:s',
            'course_days.*.end_time' => 'required|date_format:H:i:s|after:course_days.*.start_time',
        ];

    }
}
