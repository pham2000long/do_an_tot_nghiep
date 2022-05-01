<?php

namespace App\Services;

interface PromotionServiceInterface
{
    public function paginatePromotions(array $params);

    public function create(array $params);

    public function findPromotionById(int $id);

    public function update(array $params, int $id);

    public function delete(int $id);

    public function updateStatus(array $params);
}
