<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class universtiyId implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(! ctype_digit($value)) {
            $fail('يجب أن يكون الرقم الجامعي أرقاماً فقط.');
        }
        if($value[0] == '0') {
            $fail('لا يمكن أن يبدأ الرقم الجامعي بالرقم صفر.');
    }
}
}
