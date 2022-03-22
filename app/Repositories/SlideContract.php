<?php

namespace App\Repositories;

interface SlideContract extends BaseContract
{
    public function paginateSlides(array $params);
}
