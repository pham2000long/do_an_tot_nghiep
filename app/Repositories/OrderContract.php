<?php

namespace App\Repositories;

interface OrderContract extends BaseContract
{
    public function getListPurchaseHistory(int $user_id);

    public function getInfoOrderStatistic(array $param);

    public function getAllOrders(array $params);

    public function getAllOrdersByUserId(int $userId);
}
