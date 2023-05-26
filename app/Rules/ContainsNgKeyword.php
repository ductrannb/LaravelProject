<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class ContainsNgKeyword implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (preg_match('/<script/', $value)) {
            $fail('The :attribute contains ng keyword');
        }
    }
}
