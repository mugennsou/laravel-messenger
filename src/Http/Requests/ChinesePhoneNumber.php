<?php

namespace Mugennsou\LaravelMessenger\Http\Requests\Rules;

use Illuminate\Contracts\Validation\Rule;

class ChinesePhoneNumber implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return (bool)preg_match('/^1(3\d|4[056789]|5[012356789]|66|7[01345678]|8\d|9[89])\d{8}$/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.phone_number');
    }
}
