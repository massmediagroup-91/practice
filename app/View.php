<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed view
 * @property mixed file_id
 * @method static find($id)
 */
class View extends Model
{

    public function dfs()
    {
    }
    protected $fillable = ['view', 'file_id'];
}
