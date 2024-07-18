<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Gli attributi che sono assegnabili in massa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];


    public function quadri()
    {
        return $this->hasMany(Quadro::class);
    }
    /**
     * Gli attributi che dovrebbero essere nascosti per gli array.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Gli attributi che dovrebbero essere convertiti in tipi nativi.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
