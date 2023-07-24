<?php

namespace App\Rules;

use Illuminate\Validation\Rule;

class LongitudeRule extends Rule
{
    public function passes($attribute, $value)
    {
        $regex = '/^[-]?((((1[0-7][0-9])|([0-9]?[0-9]))(\.(\d{1,8}))?)|180(\.0+)?)$/';
        return preg_match($regex, $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid longitude coordinate in decimal degrees format.';
    }
}