<?php

namespace App\Rules;

use Illuminate\Validation\Rule;

class LatitudeRule extends Rule
{
    public function passes($attribute, $value)
    {
        $regex = '/^[-]?((([0-8]?[0-9])(\.(\d{1,8}))?)|(90(\.0+)?))$/';
        return preg_match($regex, $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid latitude coordinate in decimal degrees format.';
    }
}