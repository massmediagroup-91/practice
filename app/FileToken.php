<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\FileToken
 *
 * @property string token
 * @property int file_id
 * @property int type
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileToken whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileToken whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileToken whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\FileToken whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class FileToken extends Model
{
    use SoftDeletes;
    public const TYPE_STATIC = 0;
    public const TYPE_DISPOSABLE = 1;

    protected $fillable = ['token', 'file_id'];
}
