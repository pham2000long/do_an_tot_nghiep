<?php

namespace App\Services;

use App\Repositories\OrderContract;
use App\Repositories\ProductDetailContract;
use Illuminate\Support\Facades\DB;

class OrderService implements OrderServiceInterface
{
    protected $orderRepository;
    protected $productDetailRepository;

    public function __construct(
        OrderContract $orderRepository,
        ProductDetailContract $productDetailRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->productDetailRepository = $productDetailRepository;
    }

    public function getAllOrders(array $params)
    {
        $orders = $this->orderRepository->getAllOrders($params);

        return $orders;
    }

    public function getOrderById(int $id)
    {
        $orderDetail = $this->orderRepository->findById($id);

        return $orderDetail;
    }

    public function update(array $params, $id)
    {
        $order = $this->orderRepository->findById($id);

        DB::beginTransaction();
        try {
            $this->orderRepository->update($order, [
                'name' => $params['name'],
                'phone' => $params['phone'],
                'email' => $params['email'],
                'address' => $params['address'],
                'status' => $params['status']
            ]);
            if ($params['status'] == 3) {
                foreach ($order->orderDetails as $orderDetail) {
                    $productDetail = $this->productDetailRepository->findById($orderDetail->product_detail_id);
                    $productDetail->quantity = $productDetail->quantity - $orderDetail->quantity;
                    $productDetail->save();
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            \Log::error($exception);
            return ['Đã xảy ra lỗi hệ thống không thể sửa đơn hàng', false];
        }

        return ['Sửa đơn hàng thành công!', true];
    }
}
