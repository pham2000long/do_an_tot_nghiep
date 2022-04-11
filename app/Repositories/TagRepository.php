<?php

namespace App\Repositories;

use App\Models\Tag;

class TagRepository extends BaseRepository implements TagContract
{
    protected $model;

    /**
     *  @param Tag $model
     *
     */
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }
}
