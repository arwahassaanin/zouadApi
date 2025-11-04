<?php

namespace App\Http\Requests;

use App\Rules\phone;
use App\Rules\nationalId;
use App\Rules\universtiyId;
use Illuminate\Foundation\Http\FormRequest;

class profileRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $userId = $this->user()->id;

        return [
            'name' => 'required|string|min:4',
            'email' => 'required|email|unique:users,email,' . $userId,
            'phone_number' => [
                'required',
                'string',
                'max:20',
                'unique:users,phone_number,' . $userId,
                new phone(),
            ],
            'role' => 'required|in:طالب,خريج',
            'university_id' => [
                'required_if:role,طالب',
                'nullable',
                 'string',
                'unique:users,university_id,' . $userId,
                new universtiyId(),
            ],
            'national_id' => [
            'required_if:role,خريج',
            'nullable',
            'string',
            'unique:users,national_id,'. $userId,
            new nationalId()
            ],
            'university' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
