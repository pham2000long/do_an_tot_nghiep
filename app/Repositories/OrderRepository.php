<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository extends BaseRepository implements OrderContact
{
    protected $model;

    /**
     *  @param Category $model
     *
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function getListPurchaseHistory($user_id)
    {

    }
}
