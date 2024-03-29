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

    public function getLimitProducts(int $limit)
    {
        return $this->model
            ->select(
                'id',
                'category_id',
                'product_type_id',
                'supplier_id',
                'promotion_id',
                'name',
                'image',
                'slug',
                'status',
                'sale_price'
            )->orderBy('id', 'desc')
            ->limit($limit)
            ->get();
    }

    public function updateProductByPromotion(int $promotionId, array $categoryIds)
    {
        return $this->model
            ->whereHas('category', function ($query) use ($categoryIds) {
                $query->whereIn('id', $categoryIds);
            })
            ->update(['promotion_id' => $promotionId]);
    }

    public function updateProductNotPromotion(int $promotionId)
    {
        return $this->model
            ->where('promotion_id', $promotionId)
            ->update(['promotion_id' => null]);
    }

    public function getAllProductsInventory()
    {
        return $this->model
            ->whereHas('productDetails', function ($query) {
                $query->where('quantity', '>', 0);
            })
            ->where('created_at', '<=', now()->subYears(1))
            ->get();
    }
}
