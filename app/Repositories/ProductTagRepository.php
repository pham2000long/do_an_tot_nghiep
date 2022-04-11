<?php

namespace App\Repositories;

use App\Models\ProductTag;

class ProductTagRepository extends BaseRepository implements ProductTagContract
{
    protected $model;

    /**
     *  @param Tag $model
     *
     */
    public function __construct(ProductTag $model)
    {
        $this->model = $model;
    }
}
