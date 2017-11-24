<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skin extends Model
{
    protected $table = 'skins';

    protected $fillable = [
        'user_id','skin', 'cape'
    ];
}
