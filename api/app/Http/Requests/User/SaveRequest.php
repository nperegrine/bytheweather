<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\Latitude;
use App\Rules\Longitude;

class SaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => [
                'required',
                'max:250',
                'email:rfc,dns',
                Rule::unique('users', 'email')
                    ->ignore($this->route('user')?->id)
                    ->withoutTrashed()
            ],
            'latitude' => ['required', new Latitude],
            'longitude' => ['required', new Longitude],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => __('Name'),
            'email' => __('Email'),
            'latitude' => __('Latitude'),
            'longitude' => __('Longitude'),
        ];
    }
}