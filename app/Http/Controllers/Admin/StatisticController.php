<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StatisticServiceInterface;

class StatisticController extends Controller
{
    protected $statisticService;

    /**
     * @param StatisticServiceInterface $statisticService
     */
    public function __construct(StatisticServiceInterface $statisticService)
    {
        $this->statisticService = $statisticService;
    }

    public function index()
    {
        $statistic = $this->statisticService->getData();

        return view('admins.statistic.index', compact('statistic'));
    }
    public function edit()
    {

    }
}
