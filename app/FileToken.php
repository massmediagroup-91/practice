<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string token
 * @property int file_id
 * @property int type
 */
class FileToken extends Model
{
    public const TYPE_STATIC = 0;
    public const TYPE_DISPOSABLE = 1;

    protected $fillable = ['token', 'file_id'];
}
