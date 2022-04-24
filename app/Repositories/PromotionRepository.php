<?php

namespace App\Repositories;

use App\Models\Promotion;

class PromotionRepository extends BaseRepository implements PromotionContract
{
    protected $model;

    /**
     *  @param Promotion $model
     *
     */
    public function __construct(Promotion $model)
    {
        $this->model = $model;
    }

    public function paginatePromotions($params)
    {
        $query = $this->model;

        // search name
        if (isset($params['name']) && $params['name'] != '') {
            $keyword = $params['name'];
            $query->where(function ($subQuery) use ($keyword) {
                $subQuery->where('name', 'LIKE', '%' . $keyword . '%');
            });
        }

        return $query->latest()->paginate(5);
    }
}
