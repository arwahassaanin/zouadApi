<?php

namespace App\Http\Requests;

use App\Rules\phone;
use App\Rules\nationalId;
use App\Rules\universtiyId;
use Illuminate\Foundation\Http\FormRequest;

class RegistarRequest extends FormRequest
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
        $rules =[
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'university' => 'required',
            'phone_number' => [
                'required',
                'string',
                'max:20',
                'unique:users',
                new phone(),
            ],
            'address' => 'required|string',
            'department' => 'required',
            'role' => 'required|in:طالب,خريج',
        ];
          if ($this->role === 'طالب') {
        $rules['university_id'] = [
            'required',
            'string',
            'unique:users',
            new universtiyId()
        ];
    }

    if ($this->role === 'خريج') {
        $rules['national_id'] = [
            'required',
            'string',
            'unique:users',
            new nationalId()
        ];
    }

    return $rules;
    }
}
