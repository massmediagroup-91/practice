<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\File
 *
 * @property string path
 * @property string comment
 * @property int user_id
 * @property Carbon|null deleted_at
 * @property int id
 * @property Carbon|null when_delete
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\File whereWhenDelete($value)
 * @mixin \Eloquent
 */
class File extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'comment', 'deleted_at', 'user_id'];

    public function fileTokens()
    {
        return $this->hasMany('App\FileToken');
    }
}
