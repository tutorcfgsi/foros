<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidReply implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }

    public function passes($attribute, $value)
   	{
        return strlen($value) > 10 && strlen($value) < 500;
    }

    public function message()
    {
        return __("La :attribute debe tener entre 10 y 500 caracteres");
    }
}
