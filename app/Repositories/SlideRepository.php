<?php

namespace App\Repositories;

use App\Models\Slide;

class SlideRepository extends BaseRepository implements SlideContract
{
    protected $model;

    /**
     *  @param Slide $model
     *
     */
    public function __construct(Slide $model)
    {
        $this->model = $model;
    }

    /**
     * createUserInitial function
     *
     * @param array $params
     * @return array
     */
    public function paginateSlides(array $params)
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
