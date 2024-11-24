<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class userinfo extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'sid',
        'name',
        'email',
        'password',
        'image',
    ];
}
