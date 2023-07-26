<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait HasWeather
{
    /**
     * Get the user weather
     *
     * @param  mixed  $data
     * @return mixed|null
     */
    public function getWeather()
    {
        return Cache::get('weather:user:'.$this->id);
    }

    /**
     * Store the user weather update
     *
     * @param  mixed  $data
     */
    public function updateWeather($data): void
    {
        if (! $data) {
            return;
        }

        Cache::remember('weather:user:'.$this->id, now()->addHours(1), function () use ($data) {
            return $data;
        });
    }
}
