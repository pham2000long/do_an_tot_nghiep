<?php

namespace App\Services;

interface ProductServiceInterface
{
    public function getAllProducts(array $params);

    public function create(array $params);

    public function findProductById(int $id);

    public function update(int $id, array $params);

    public function getLimitProducts(int $limit);

    public function updateStatus(array $params);

    public function delete(int $id);

    public function getAllProductsInventory();
}
