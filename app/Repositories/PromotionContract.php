<?php

namespace App\Repositories;

interface PromotionContract extends BaseContract
{
    public function paginatePromotions(array $params);
}
