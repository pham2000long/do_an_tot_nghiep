<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderContract
{
    protected $model;

    /**
     *  @param Order $model
     *
     */
    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function getListPurchaseHistory(int $user_id)
    {
        return $this->model->where('user_id', $user_id)
            ->with([
            'payment',
            'orderDetails' => function($query) {
                $query->with([
                    'productDetail' => function ($query) {
                        $query->with(['product']);
                    }
                ])->latest();
            }
        ])->latest()->get();
    }

    public function getInfoOrderStatistic(array $param)
    {
        $query = $this->model->where('status', 3);
        if ($param['carbon_year']) {
            $query->whereYear('created_at', $param['carbon_year']);
        }

        if ($param['carbon_year']) {
            $query->whereMonth('created_at', $param['carbon_month']);
        }
        return $query->count();
    }

    public function getAllOrders(array $params)
    {
        return $this->model
            ->orderByDesc('created_at')
            ->orderBy('id')
            ->get();
    }

    public function getAllOrdersByUserId(int $userId)
    {
        return $this->model
            ->where('user_id', $userId)
            ->orderByDesc('created_at')
            ->orderBy('id')
            ->get();
    }
}
