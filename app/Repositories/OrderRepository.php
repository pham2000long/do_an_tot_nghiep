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
        return $this->model->where('status', '>', 0)
            ->whereYear('created_at', $param['carbon_year'])
            ->whereMonth('created_at', $param['carbon_month'])->count();
    }
}
