<?php

namespace App\Services;

use App\Repositories\ProductContract;
use App\Repositories\PromotionContract;
use App\Repositories\SlideContract;
use App\Repositories\SnapshotContract;
use Illuminate\Support\Facades\DB;

class PromotionService implements PromotionServiceInterface
{
    protected $promotionRepository;
    protected $productRepository;

    /**
     * create a new instance
     *
     * @param PromotionContract $promotionRepository
     * @param ProductContract $productRepository
     */
    public function __construct(
        PromotionContract $promotionRepository,
        ProductContract $productRepository
    ) {
        $this->promotionRepository = $promotionRepository;
        $this->productRepository = $productRepository;
    }

    public function paginatePromotions(array $params)
    {
        $promotions = $this->promotionRepository->paginatePromotions($params);

        return $promotions;
    }

    public function create($params)
    {
        if ($params['promotion_date']) {
            $date = getDateTo($params['promotion_date']);
        }
        $data = array_merge($params, $date);
        DB::beginTransaction();
        try {
            $categoryIds = [];
            if (count($data['categories'])) {
                $categoryIds = $data['categories'];
                $data = array_diff_key($data, array_flip(['categories']));
            }
            $data = array_diff_key($data, array_flip(['_token', 'promotion_date']));
            $promotion = $this->promotionRepository->create($data);
            $this->productRepository->updateProductByPromotion($promotion->id, $categoryIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error($exception);
            return false;
        }

        return true;
    }

    public function updateStatus(array $params)
    {
        $promotion = $this->promotionRepository->findById($params['id']);

        if (empty($promotion)) {
            return ['Khuyến mãi không tồn tại!', false];
        }
        try {
            $promotion->status = $params['status'];
            $promotion->save();
        } catch (\Exception $exception) {
            \Log::error($exception);
            return ['Đã xảy ra lỗi hệ thống không thể sửa trạng thái khuyến mại', false];
        }

        return ['Sửa trạng thái thành công', true];
    }

    public function findPromotionById(int $id)
    {
        $promotion = $this->promotionRepository->findById($id);

        return $promotion;
    }

    public function update($params, $id)
    {
        $promotion = $this->promotionRepository->findById($id);
        if (empty($promotion)) {
            return ['Khuyến mãi không tồn tại!', false];
        }
        if ($params['promotion_date']) {
            $date = getDateTo($params['promotion_date']);
        }
        $data = array_merge($params, $date);

        DB::beginTransaction();
        try {
            $categoryIds = [];
            $this->productRepository->updateProductNotPromotion($promotion->id);
            if (count($data['categories'])) {
                $categoryIds = $data['categories'];
                $data = array_diff_key($data, array_flip(['categories']));
            }
            $data = array_diff_key($data, array_flip(['_token', 'promotion_date']));
            $this->promotionRepository->update($promotion, $data);
            $this->productRepository->updateProductByPromotion($promotion->id, $categoryIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error($exception);
            return ['Đã xảy ra lỗi hệ thống không thể sửa khuyến mãi', false];
        }

        return ['Sửa khuyến mãi thành công!', true];
    }

    public function delete(int $id)
    {
        $promotion = $this->promotionRepository->findById($id);

        if (empty($promotion)) {
            return ['Khuyến mại không tồn tại!', false];
        }

        try {
            $this->productRepository->updateProductNotPromotion($promotion->id);
            $this->promotionRepository->destroy($id);
        } catch (\Exception $exception) {
            return ['Đã xảy ra lỗi hệ thống không thể xóa khuyến mại', false];
        }

        return ['Xóa khuyến mại thành công!', true];
    }
}
