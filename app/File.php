<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed name
 * @property mixed comment
 * @property mixed user_id
 * @property mixed deleted_at
 */
class File extends Model
{
    protected $fillable = ['name', 'comment', 'deleted_at', 'user_id'];
}
