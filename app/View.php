<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int view
 * @property int file_id
 */
class View extends Model
{

    public function dfs()
    {
    }
    protected $fillable = ['view', 'file_id'];
}
