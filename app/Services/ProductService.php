<?php

namespace App\Services;

use App\Repositories\ProductContract;
use App\Repositories\ProductDetailContract;

class ProductService implements ProductServiceInterface
{
    protected $productRepository;
    protected $productDetailRepository;

    public function __construct(
        ProductContract $productRepository,
        ProductDetailContract $productDetailRepository
    ) {
        $this->productRepository = $productRepository;
        $this->productDetailRepository = $productDetailRepository;
    }

    public function getAllProducts(array $params)
    {
        $products = $this->productRepository->getAllProducts($params);

        return $products;
    }
}
