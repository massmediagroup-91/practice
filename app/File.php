<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string comment
 * @property int user_id
 * @property Carbon|null deleted_at
 * @property int id
 * @property Carbon|null when_delete
 */
class File extends Model
{
    protected $fillable = ['name', 'comment', 'deleted_at', 'user_id'];
}
