<?php

namespace App\Http\Requests\Config;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfigRequest extends FormRequest
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
//        dd($this->request);
        return [
            "report.required_time" => ['sometimes', 'date_format:H:i'],
            'report.penalty_per_hour' => ['sometimes', 'numeric'],
            'report.last_time_with_penalty' => ['sometimes', 'date_format:H:i'],
            'report.last_time' => ['sometimes', 'date_format:H:i'],
            'report.base_time' => ['sometimes', 'date_format:H:i'],
            'card.penalty_card' => ['sometimes', 'regex:/^([0-9]{4})-([0-9]{4})-([0-9]{4})-([0-9]{4})$/'],
            'card.installment_card' => ['sometimes', 'regex:/^([0-9]{4})-([0-9]{4})-([0-9]{4})-([0-9]{4})$/'],
            'card.graduated_card' => ['sometimes', 'regex:/^([0-9]{4})-([0-9]{4})-([0-9]{4})-([0-9]{4})$/'],
            'performance_over_view' => ['sometimes', 'numeric'],
            'leave_rules' => ['sometimes', 'string'],
            'leave_options.max_leave_time' => ['sometimes', 'numeric'],
            'leave_options.notice_before_24_hours' => ['sometimes', 'numeric'],
            'leave_options.notice_during_24_hours' => ['sometimes', 'numeric'],
            'leave_options.without_notice' => ['sometimes', 'numeric'],
        ];
    }
}
