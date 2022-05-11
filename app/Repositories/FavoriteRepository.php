<?php

namespace App\Repositories;

use App\Models\Favorite;

class FavoriteRepository extends BaseRepository implements FavoriteContract
{
    protected $model;

    /**
     *  @param Favorite $model
     *
     */
    public function __construct(Favorite $model)
    {
        $this->model = $model;
    }
}
