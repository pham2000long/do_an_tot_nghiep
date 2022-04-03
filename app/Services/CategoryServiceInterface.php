<?php

namespace App\Services;

interface CategoryServiceInterface
{
    public function paginateCategories(array $parrams);

    public function create(array $parrams);

    public function findById(int $id);

    public function update(int $id, array $params);

    public function delete(int $id);
}
