<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthServer extends Model
{
    protected $table = 'game_profiles';

    protected $fillable = [
       'uuid','access_token','client_token', 'session', 'server'
    ];
}
