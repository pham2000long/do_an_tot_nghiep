<?php

namespace App\Services;

interface OrderServiceInterface
{
    public function getAllOrders(array $params);

    public function getOrderById(int $id);

    public function update(array $params, $id);

    public function getAllOrdersByUserId(int $userId);
}
