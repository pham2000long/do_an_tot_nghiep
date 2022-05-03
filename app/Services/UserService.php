<?php

namespace App\Services;

use App\Repositories\UserContract;
use App\Repositories\OrderContract;

class UserService implements UserServiceInterface
{
    protected $userRepository;
    protected $orderRepository;

    /**
     * @param OrderContract $orderRepository
     * @param UserContract $userRepository
     */
    public function __construct(
        OrderContract $orderRepository,
        UserContract $userRepository
    ) {
        $this->userRepository = $userRepository;
        $this->orderRepository = $orderRepository;
    }

    /**
     * @param array $parrams
     * @return mixed
     */
    public function paginateUsers(array $parrams)
    {
        return $this->userRepository->paginateUsers($parrams);
    }

    /**
     * @param int $id
     * @return array
     */
    public function show(int $id)
    {
        $user = $this->userRepository->findById($id);
        if (empty($user)) {
            return ['Người dùng không tồn tại!', false];
        }

        $purchaseHistory = $this->orderRepository->getListPurchaseHistory($id);

        return [
            'user' => $user,
            'purchaseHistory' => $purchaseHistory
        ];
    }

    /**
     * @param array $parrams
     * @return mixed
     */
    public function delete(int $id)
    {
        $user = $this->userRepository->findById($id);
        if (empty($user)) {
            return ['Người dùng không tồn tại!', false];
        }

        try {
            $this->userRepository->updateWhere(
                ['id' => $id, 'active' => 1],
                ['active' => 0]
            );
        } catch (\Exception $exception) {
            \Log::error($exception);
            return ['Đã xảy ra lỗi hệ thống không thể xóa người dùng', false];
        }

        return ['Xóa thành công người dùng', true];
    }
}
