<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanRequest extends FormRequest
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
    public function rules()
    {
        return [
            'due_date' => 'required|date|after:today',
        ];
    }

    public function messages()
    {
        return [
            'due_date.required' => 'O campo data é obrigatório.',
        ];
    }
}
