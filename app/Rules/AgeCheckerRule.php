<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AgeCheckerRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value >= 5 && $value <=26)
            $fail("It's time to learn");
        else if($value >= 27 && $value <= 55)
            $fail("It's time to work");
        else
            $fail("It's time to retire");
    }
}
