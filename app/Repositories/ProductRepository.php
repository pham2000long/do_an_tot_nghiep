<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductContract
{
    protected $model;

    /**
     *  @param Product $model
     *
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }
}
