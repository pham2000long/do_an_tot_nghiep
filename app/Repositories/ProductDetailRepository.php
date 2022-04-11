<?php

namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductDetail;

class ProductDetailRepository extends BaseRepository implements ProductDetailContract
{
    protected $model;

    /**
     *  @param ProductDetail $model
     *
     */
    public function __construct(ProductDetail $model)
    {
        $this->model = $model;
    }
}
