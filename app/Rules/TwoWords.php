<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TwoWords implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  Closure  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Ensure the name contains at least two words
        if (str_word_count($value) < 2) {
             $fail(__(":attribute") . ' ' . __('must contain at least a first name and a last name.'));

        }
    }
}
