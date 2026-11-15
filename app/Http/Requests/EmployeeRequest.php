<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('employees','email')->ignore($this->route('employee'))
            ],
            'phone_number' => [
                'required',
                'string',
                'max:30',
                Rule::unique('employees','phone_number')->ignore($this->route('employee'))
            ],
            'hire_date' => ['required','date','before_or_equal:today'],
            'department_id' => ['required','exists:departments,id'],
            'position_id' => ['required','exists:positions,id']
        ];
    }
}
