<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTransactionRequest extends FormRequest
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
            'amount' => ['required', 'numeric'],
            'details' => ['required', 'string'],
            'image' => ['required', 'image', 'max:8192'],
            'factor_id' => [
                'required',
                Rule::exists('factors', 'id')->whereIn('status', ['pending', 'overdue']),
            ]
        ];
    }
}
