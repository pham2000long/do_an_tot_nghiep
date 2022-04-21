<?php

namespace App\Repositories;

interface ProductContract extends BaseContract
{
    public function getAllProducts(array $params);

    public function findProductById(int $id);

    public function getLimitProducts(int $limit);
}
