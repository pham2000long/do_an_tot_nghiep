<?php

namespace App\Services;

interface SlideServiceInterface
{
    public function paginateSlides(array $params);

    public function create($request);

    public function findSlideById(int $id);

    public function update($request, int $id);

    public function delete(int $id);

    public function updateStatus(array $params);
}
