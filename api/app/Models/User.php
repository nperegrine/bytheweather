<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Returns the place of the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function place(): HasOne
    {
        return $this->hasOne(Place::class);
    }

    /**
     * Returns the weather of the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function weather(): HasOneThrough
    {
        return $this->hasOneThrough(Weather::class, Place::class);
    }
}