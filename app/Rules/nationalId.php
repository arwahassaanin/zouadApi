<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class nationalId implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //

        if(!strlen($value) == 9) {
            $fail('يجب أن يتكون رقم الهوية من 9 أرقام.');
        }
        if(!ctype_digit($value)) {
            $fail('يجب أن يحتوي رقم الهوية على أرقام فقط.');
        }
        if($value[0] == '0' ) {
            $fail('لا يمكن أن يبدأ رقم الهوية بالرقم صفر.');
        }
    }
}
