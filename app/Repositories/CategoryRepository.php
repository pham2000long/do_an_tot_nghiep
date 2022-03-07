<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\ProductType;

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
}
