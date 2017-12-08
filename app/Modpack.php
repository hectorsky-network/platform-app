<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modpack extends Model
{
    protected $table = 'modpacks';
    protected $fillable = [
        'onwer','name','displayName', 'url', 'platformUrl','minecraft','ratings','downloads','runs','description','tags','isServer','isOfficial','version','forceDir','feedUrl','iconUrl','logoUrl','backgroundUrl','solderUrl'
    ];
}
