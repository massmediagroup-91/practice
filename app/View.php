<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\View
 *
 * @property int view
 * @property int file_id
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\View whereView($value)
 * @mixin \Eloquent
 */
class View extends Model
{
    protected $fillable = ['view', 'file_id'];
}
