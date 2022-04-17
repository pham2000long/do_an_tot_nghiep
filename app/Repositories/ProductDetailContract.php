<?php

namespace App\Repositories;

interface ProductDetailContract extends BaseContract
{
    public function deleteProductDetailByProductId(int $produciId);
}
