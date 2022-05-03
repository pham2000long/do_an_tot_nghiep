<?php

namespace App\Services;

interface StatisticServiceInterface
{
    public function getData();

    public function getDataByMonthYear(array $param);
}
