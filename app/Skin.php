<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Skin
 *
 * @property int $id
 * @property string|null $skin
 * @property string|null $skin_type
 * @property string|null $cape
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skin newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skin newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skin query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skin whereCape($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skin whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skin whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skin whereSkin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skin whereSkinType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Skin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Skin extends Model
{
    protected $table = 'skins';

    protected $fillable = [
        'user_id','skin','skin_type', 'cape'
    ];
}
