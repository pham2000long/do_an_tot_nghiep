<?php

namespace App\Repositories;

use App\Models\ProductDetail;
use App\Models\ProductImage;

class ProductDetailRepository extends BaseRepository implements ProductDetailContract
{
    protected $model;
    protected $productImageModel;

    /**
     * @param ProductDetail $model
     *
     */
    public function __construct(
        ProductDetail $model,
        ProductImage $productImageModel
    ) {
        $this->model = $model;
        $this->productImageModel = $productImageModel;
    }

    public function deleteProductDetailByProductId(int $productId)
    {
        $productDetailIds = $this->model->where('product_id', $productId)
            ->get()->pluck('id');
        $productImages = $this->productImageModel->whereIn('product_detail_id', $productDetailIds)
            ->get();
        foreach ($productImages as $productImage) {
            $snapshot = new SnapshotRepository();
            $snapshot->deleteThumb($productImage->name, 'product_images');
            $this->productImageModel->where('id', $productImage->id)->delete();
        }

        return $this->model
            ->whereIn('id', $productDetailIds)
            ->delete();
    }
}
