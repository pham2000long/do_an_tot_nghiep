<?php

namespace App\Repositories;

interface ProductContract extends BaseContract
{
    public function getAllProducts(array $params);
}
