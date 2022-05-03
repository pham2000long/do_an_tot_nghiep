<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\StatisticServiceInterface;
use Illuminate\Http\Request;

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
    public function edit(Request $request)
    {
        $data = $this->statisticService->getDataByMonthYear($request->all());

        return response()->json($data, 200);
    }
}
