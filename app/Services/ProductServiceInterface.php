<?php

namespace App\Services;

interface ProductServiceInterface
{
    public function getAllProducts(array $params);

    public function create(array $params);
}
