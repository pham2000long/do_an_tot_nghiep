<?php

namespace App\Repositories;

interface OrderContact extends BaseContract
{
    public function getListPurchaseHistory($user_id);
}
