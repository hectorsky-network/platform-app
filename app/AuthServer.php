<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AuthServer
 *
 * @property int $id
 * @property string $uuid
 * @property string|null $access_token
 * @property string|null $access_token_2
 * @property string|null $access_token_3
 * @property string|null $play_token
 * @property string|null $client_token
 * @property string|null $client_token_2
 * @property string|null $client_token_3
 * @property string|null $session
 * @property string|null $server
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereAccessToken2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereAccessToken3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereClientToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereClientToken2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereClientToken3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer wherePlayToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereServer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereSession($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AuthServer whereUuid($value)
 * @mixin \Eloquent
 */

class AuthServer extends Model
{
    protected $table = 'game_profiles';

    protected $fillable = [
       'uuid','access_token','client_token', 'session', 'server'
    ];
}
