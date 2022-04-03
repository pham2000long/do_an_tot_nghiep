<?php

namespace App\Repositories;

interface CategoryContract extends BaseContract
{
    public function paginateCategories(array $params);
}
