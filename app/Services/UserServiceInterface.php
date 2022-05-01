<?php

namespace App\Services;

interface UserServiceInterface
{
    public function paginateUsers(array $parrams);

    public function show(int $id);

    public function delete(int $id);
}
