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

    public function getAllProducts(array $params)
    {
        return $this->model->get();
    }

    public function findProductById(int $id)
    {
        return $this->model
            ->with([
                'category',
                'productType',
                'supplier',
                'productDetails' => function ($query) {
                    $query->with('productImages');
                }
            ])
            ->where('id', $id)
            ->first();
    }
}
