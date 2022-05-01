<?php

namespace App\Repositories;

interface UserContract extends BaseContract
{
    public function paginateUsers(array $params);
}
