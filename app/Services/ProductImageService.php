<?php

namespace App\Services;

use App\Repositories\ProductImageContract;
use App\Repositories\SnapshotContract;

class ProductImageService implements ProductImageServiceInterface
{
    protected $snapshotRepository;
    protected $productImageRepository;

    public function __construct(
        SnapshotContract $snapshotRepository,
        ProductImageContract $productImageRepository
    ) {
        $this->snapshotRepository = $snapshotRepository;
        $this->productImageRepository = $productImageRepository;
    }

    public function deleteImage($id)
    {
        $image = $this->productImageRepository->findById($id);

        $this->snapshotRepository->deleteThumb($image->name, 'products');

        $this->productImageRepository->destroy($id);
    }
}
