<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Star
 *
 * @property int $id
 * @property int $givenBy
 * @property int $givenTo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereGivenBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereGivenTo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Star whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Star extends Model
{
    protected $table = 'stars';

    protected $fillable = [
        'givenBy','givenTo'
    ];
}
