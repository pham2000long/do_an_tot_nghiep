<?php

namespace App\Services;

use App\Repositories\UserContract;

class UserService implements UserServiceInterface
{
    protected $userRepository;

    /**
     * @param UserContract $userRepository
     */
    public function __construct(
        UserContract $userRepository
    ) {
        $this->userRepository = $userRepository;
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

        return [
          'user' => $user
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
