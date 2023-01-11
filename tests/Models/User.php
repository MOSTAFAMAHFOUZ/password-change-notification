<?php

namespace ven\PasswordChangeNotification\Tests\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use ven\PasswordChangeNotification\Contracts\PasswordChangedContract;
use ven\PasswordChangeNotification\Observers\PasswordChangedObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Laravel\Sanctum\HasApiTokens;
use ven\PasswordChangeNotification\Traits\PasswordChangedTrait;


class User extends Authenticatable implements PasswordChangedContract
{
    use  HasFactory, Notifiable, PasswordChangedTrait;

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


  
}
