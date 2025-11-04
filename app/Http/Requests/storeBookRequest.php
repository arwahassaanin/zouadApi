<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\phone;
use App\Models\Faculty;
use Illuminate\Foundation\Http\FormRequest;

class storeBookRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|min:3|max:255',
            'name' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (!Faculty::where('name', $value)->exists()) {
                        $fail("اسم الكلية غير موجود.");
                    }
                }
            ],
            // 'phone_number' => [
            //     'required',
            //     'string',
            //     'max:20',
            //     function ($attribute, $value, $fail) {
            //         if (!User::where('phone_number', $value)->exists()) {
            //             $fail("رقم الجوال غير موجود.");
            //         }
            //     }
            // ],
            // 'address' => 'required|string',
            'condition' => 'required|in:حديد,مستعمل',
            'status' => 'required|in:متوفر,غير متوفر',
        ];
    }
}
