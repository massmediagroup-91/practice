<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\File
 *
 * @property string name
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
 */
	class File extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property-read int|null $clients_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App{
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
 */
	class FileToken extends \Eloquent {}
}

namespace App{
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
 */
	class View extends \Eloquent {}
}

