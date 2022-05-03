<?php

namespace App\Repositories;

interface OrderDetailContract extends BaseContract
{
    public function getPricesOrderDetailStatistic(array $param);

    public function getOrderDetailStatistic(array $param);
}
