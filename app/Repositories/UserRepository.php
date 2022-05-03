<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository implements UserContract
{
    protected $model;

    /**
     * @param User $model
     */
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function paginateUsers(array $params)
    {
        $query = $this->model->where('role', '<>', 'admin');

        if (!empty($params['name'])) {
            $query->where('name', 'LIKE', '%' . $params['name'] . '%');
        }

        return $query->latest()->paginate(5);
    }
}
