<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository implements CategoryContract
{
    protected $model;

    /**
     *  @param Category $model
     *
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function paginateCategories(array $params)
    {
        $query = $this->model;

        if (!empty($params['name'])) {
            $query->where('name', 'LIKE', '%' . $params['name'] . '%');
        }

        return $query->latest()->paginate(5);
    }
}
