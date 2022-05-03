<?php

namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository extends BaseRepository implements SupplierContract
{
    protected $model;

    /**
     *  @param Supplier $model
     *
     */
    public function __construct(Supplier $model)
    {
        $this->model = $model;
    }

    public function getSupplierStatistic()
    {
        return $this->model->select('name')->has('products')->get();
    }
}
