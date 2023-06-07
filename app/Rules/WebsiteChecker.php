<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class WebsiteChecker implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
        $pattern = "/(http(s)?|ftp(s)){1}:\/\/.+\..+/iu";
        if (!preg_match($pattern, $value)) {
            $fail('URL does not match format.');
        }
    }
}
