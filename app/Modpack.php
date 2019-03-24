<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Modpack
 *
 * @property int $id
 * @property int $owner
 * @property string $name
 * @property string $displayName
 * @property string|null $url
 * @property string|null $platformUrl
 * @property string $minecraft
 * @property int $ratings
 * @property int $downloads
 * @property int $runs
 * @property string|null $description
 * @property string|null $tags
 * @property int $isServer
 * @property int $isOfficial
 * @property string $version
 * @property int $forceDir
 * @property string|null $feedUrl
 * @property string|null $iconUrl
 * @property string|null $logoUrl
 * @property string|null $backgroundUrl
 * @property string|null $solderUrl
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereBackgroundUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereDownloads($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereFeedUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereForceDir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereIconUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereIsOfficial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereIsServer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereLogoUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereMinecraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereOwner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack wherePlatformUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereRatings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereRuns($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereSolderUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modpack whereVersion($value)
 * @mixin \Eloquent
 */

class Modpack extends Model
{
    protected $table = 'modpacks';
    protected $fillable = [
        'owner','name','displayName', 'url', 'platformUrl','minecraft','ratings','downloads','runs','description','tags','isServer','isOfficial','version','forceDir','feedUrl','iconUrl','logoUrl','backgroundUrl','solderUrl'
    ];
}
