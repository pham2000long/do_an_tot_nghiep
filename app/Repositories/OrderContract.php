<?php

namespace App\Repositories;

interface OrderContract extends BaseContract
{
    public function getListPurchaseHistory(int $user_id);

    public function getInfoOrderStatistic(array $param);
}
