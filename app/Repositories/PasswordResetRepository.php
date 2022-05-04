<?php

namespace App\Repositories;

use App\Models\PasswordReset;

class PasswordResetRepository extends BaseRepository implements PasswordResetContract
{
    /**
     *  @param PasswordReset $model
     *
     */
    public function __construct(PasswordReset $model)
    {
        $this->model = $model;
    }
}
