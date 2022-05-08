<?php

namespace App\Repositories;

interface ProductContract extends BaseContract
{
    public function getAllProducts(array $params);

    public function findProductById(int $id);

    public function getLimitProducts(int $limit);

    public function updateProductByPromotion(int $promotionId, array $categoryIds);

    public function updateProductNotPromotion(int $promotionId);

    public function getAllProductsInventory();
}
