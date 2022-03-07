<?php

namespace App\Repositories;

use App\Models\ProductType;

class ProductTypeRepository extends BaseRepository implements ProductTypeContract
{
    protected $model;

    /**
     *  @param ProductType $model
     *
     */
    public function __construct(ProductType $model)
    {
        $this->model = $model;
    }
}
