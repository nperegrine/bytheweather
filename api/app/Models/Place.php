<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Place extends Model
{
    use HasFactory;

    /**
     * Returns the weather of the place
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function weather(): HasOne
    {
        return $this->hasOne(Weather::class);
    }
}