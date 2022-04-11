<?php

namespace App\Repositories;

use App\Models\ProductImage;

class ProductImageRepository extends BaseRepository implements ProductImageContract
{
    protected $model;

    /**
     *  @param ProductImage $model
     *
     */
    public function __construct(ProductImage $model)
    {
        $this->model = $model;
    }
}
