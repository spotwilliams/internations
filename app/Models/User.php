<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * @package App\Models
 * @version March 27, 2019, 5:06 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection groupHasUsers
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property Collection groups
 * @property string name
 * @property string email
 * @property string password
 * @property string remember_token
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    public $table = 'users';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
            'name',
            'email',
            'password',
            'remember_token'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
            'name' => 'string',
            'email' => 'string',
            'password' => 'string',
            'remember_token' => 'string'
    ];

    protected $hidden = [
            'password'
    ];
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
            'name' => 'required',
            'email' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'group_has_users');
    }

    public function getGroupAttribute()
    {
        return optional($this->groups)->first();
    }
}
