<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/** @property int id */
/** @property string username */
/** @property string avatar */
/** @property int steam_id */
/** @property int points */
/** @property Carbon created_at */
/** @property Carbon updated_at */

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'avatar', 'steam_id', 'points',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function getByUserIdOrSteamId(int $id): User
    {
        return $this
            ->where('id' , $id)
            ->orWhere('steam_id', $id)
            ->first();
    }
}
