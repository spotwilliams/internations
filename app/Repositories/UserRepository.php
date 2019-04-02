<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\BaseRepository;
use Illuminate\Database\QueryException;

/**
 * Class UserRepository
 * @package App\Repositories
 * @version March 27, 2019, 5:06 pm UTC
 */
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
            'name',
            'email',
            'password',
            'remember_token'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    public function create(array $attributes)
    {
        $user = parent::create($attributes);
        try {
            $user->groups()->sync($attributes['group']);
        } catch (QueryException $noValueToSync) {
        }

        return $user;
    }

    public function update(array $attributes, $id)
    {
        /** @var User $user */
        $user = parent::update($attributes, $id);
        $user->groups()->detach($attributes['group']);
        try {
            $user->groups()->sync($attributes['group']);
        } catch (QueryException $noValueToSync) {
        }
        return $user;

    }
}
