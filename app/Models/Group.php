<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * Class Group
 * @package App\Models
 * @version March 27, 2019, 5:01 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection groupHasUsers
 * @property \Illuminate\Database\Eloquent\Collection roleHasPermissions
 * @property string name
 * @property string description
 */
class Group extends Model
{

    public $table = 'groups';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
            'name',
            'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
            'name' => 'string',
            'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
            'name' => 'required',
            'description' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function users()
    {
        return $this->belongsToMany(User::class, 'group_has_users');
    }

}
