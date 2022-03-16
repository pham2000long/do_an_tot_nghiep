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
}
