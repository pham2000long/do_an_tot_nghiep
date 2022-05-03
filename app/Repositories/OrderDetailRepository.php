<?php

namespace App\Repositories;

use App\Models\OrderDetail;
use Illuminate\Database\Eloquent\Builder;

class OrderDetailRepository extends BaseRepository implements OrderDetailContract
{
    protected $model;

    /**
     *  @param OrderDetail $model
     *
     */
    public function __construct(OrderDetail $model)
    {
        $this->model = $model;
    }

    public function getPricesOrderDetailStatistic(array $param)
    {
        return $this->model
            ->whereDate('created_at', $param['day_of_month'])
            ->whereHas('order', function (Builder $query) {
                $query->where('status', '>', 0);
            })
            ->with([
                'productDetail' => function($query) {
                    $query->with(['product']);
                }]
            )->get();
    }

    public function getOrderDetailStatistic(array $param)
    {
        return $this->model
            ->whereYear('created_at', $param['carbon_year'])
            ->whereMonth('created_at', $param['carbon_month'])
            ->whereHas('order', function (Builder $query) {
                $query->where('status', '>', 0);
            })->with([
                'order' => function($query) {
                    $query->select('id', 'order_code');
                },
                'productDetail' =>function($query) {
                    $query->select('id', 'product_id', 'color')->with([
                        'product' => function($query) {
                            $query->select('id', 'supplier_id', 'name', 'sku_code', 'import_price', 'sale_price')->with([
                                'supplier' => function($query) {
                                    $query->select('id', 'name');
                                }
                            ]);
                        }
                    ]);
                }
            ])->latest()->get();
    }
}
