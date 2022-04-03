<?php

namespace App\Services;

use App\Repositories\CategoryContract;
use App\Repositories\ProductTypeContract;

class CategoryService implements CategoryServiceInterface
{
    protected $categoryRepository;
    protected $productTypeRepository;

    /**
     * create a new instance
     *
     * @param CategoryContract $categoryRepository
     * @param ProductTypeContract $productTypeRepository
     */
    public function __construct(
        CategoryContract $categoryRepository,
        ProductTypeContract $productTypeRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productTypeRepository = $productTypeRepository;
    }

    public function paginateCategories(array $parrams)
    {
        $categories = $this->categoryRepository->paginateCategories($parrams);

        return $categories;
    }

    public function create($parrams)
    {
        try {
            $this->categoryRepository->create($parrams);
        } catch (\Exception $exception) {
            \Log::error($exception);
            return ['Đã xảy ra lỗi hệ thống không thể tạo danh mục', false];
        }

        return ['Thêm mới danh mục thành công!', true];
    }

    public function findById(int $id)
    {
        $category = $this->categoryRepository->findById($id);
        if (empty($category)) {
            return [false, null];
        }
        return [true, $category];
    }

    public function update(int $id, array $params)
    {
        $category = $this->categoryRepository->findById($id);

        try {
            $this->categoryRepository->update($category, $params);
        } catch (\Exception $exception) {
            \Log::error($exception);
            return ['Đã xảy ra lỗi hệ thống không sửa danh mục', false];
        }
        return ['Sửa danh mục thành công!', true];
    }

    public function delete(int $id)
    {
        $producTypes = $this->productTypeRepository->findByCategoryId($id);
        if (!empty($producTypes)) {
            return ['Không thể xóa danh mục vì còn tồn tại loại sản phẩm thuộc danh mục!', false];
        }

        try {
            $this->categoryRepository->destroy($id);
        } catch (\Exception $exception) {
            \Log::error($exception);
            return ['Đã xảy ra lỗi hệ thống không thể xóa danh mục', false];
        }

        return ['Xóa thành công danh mục', true];
    }
}
