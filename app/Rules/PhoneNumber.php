<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumber implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Pattern for international phone numbers (E.164 format, optional '+', country code, and numbers)
        $pattern = '/^\+?[1-9]\d{1,14}$/';

        if (!preg_match($pattern, $value)) {
            $fail(__(":attribute") . ' ' . __('must be a valid phone number in international format'));
        }
    }
}
