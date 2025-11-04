<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class phone implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //   if (!preg_match('/^(059|056)[0-9]{7}$/', $value)) {
        //     $fail('The mobile number must start with 059 or 056 and be 10 digits long.');
        // }
        if(! (strlen($value)== 9))
            $fail('يجب أن يكون رقم الجوال مكون من 9 أرقام.');

        if(!str_starts_with($value,'59') && !str_starts_with($value,'56'))

            $fail('يجب أن يبدأ رقم الجوال بـ 59 أو 56.');

        if(!ctype_digit($value))
            $fail('يجب أن يحتوي رقم الجوال على أرقام فقط.');

    }
}
