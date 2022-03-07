<?php

namespace App\Repositories;

use App\Models\Slide;

class SlideRepostitory extends BaseRepository implements SlideContract
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
}
