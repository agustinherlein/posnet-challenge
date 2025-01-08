<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CreditCardNumber implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

        // Remove any non-numeric characters (such as spaces or dashes)
        $cardNumber = preg_replace('/\D/', '', $attribute);

        // Regular expression for validating the general credit card format
        $pattern = "/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|3[47][0-9]{13}|6(?:011|5[0-9]{2})[0-9]{12}|(2131|1800|35\d{3})\d{11})$/";

        if (!preg_match($pattern, $cardNumber)) {
            $fail("Invalid Card number");
        }
    }
}
