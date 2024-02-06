<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FactorCreateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'total_amount' => ['required', 'integer'],
            'amount_paid' => ['nullable', 'integer'],
            'du_date' => ['required', 'date'],
            'description' => ['nullable'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
