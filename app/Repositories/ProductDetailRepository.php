<?php

namespace App\Repositories;

use App\Models\Product;

class ProductDetailRepository extends BaseRepository implements ProductDetailContract
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
