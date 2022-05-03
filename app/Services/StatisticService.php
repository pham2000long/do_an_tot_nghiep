<?php

namespace App\Services;

use App\Repositories\OrderContract;
use App\Repositories\OrderDetailContract;
use App\Repositories\SupplierContract;
use Illuminate\Support\Carbon;

class StatisticService implements StatisticServiceInterface
{
    protected $orderRepository;
    protected $orderDetailRepository;
    protected $supplierRepository;

    /**
     * @param OrderContract $orderRepository
     * @param OrderDetailContract $orderDetailRepository
     * @param SupplierContract $supplierRepository
     */
    public function __construct(
        OrderContract $orderRepository,
        OrderDetailContract $orderDetailRepository,
        SupplierContract $supplierRepository
    ) {
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
        $this->supplierRepository = $supplierRepository;
    }

    public function getData()
    {
        $carbon = new Carbon('first day of this month');

        $count_products = 0;
        $total_revenue = 0;
        $total_profit = 0;
        for ($i = 0; $i < $carbon->daysInMonth; $i++) {
            $date = $carbon->copy()->addDay($i)->format('d/m/Y');

            $data['labels'][] = $date;

            $param['day_of_month'] = $carbon->copy()->addDay($i)->format('Y-m-d');

            $order_details = $this->orderDetailRepository->getPricesOrderDetailStatistic($param);

            $revenue = 0;
            $profit = 0;

            if (!empty($order_details)) {
                foreach ($order_details as $order_detail) {
                    $revenue = $revenue + $order_detail->price * $order_detail->quantity;
                    $profit = $profit + $order_detail->quantity * ($order_detail->price - $order_detail->productDetail->product->import_price);
                    $count_products = $count_products + $order_detail->quantity;
                }
            }

            $total_revenue = $total_revenue + $revenue;
            $total_profit = $total_profit + $profit;
            $data['revenues'][] = $revenue;
        }

        $data['count_products'] = $count_products;
        $data['total_revenue'] = $total_revenue;
        $data['total_profit'] = $total_profit;

        $param['carbon_year'] = $carbon->year;
        $param['carbon_month'] = $carbon->month;

        $data['count_orders'] = $this->orderRepository->getInfoOrderStatistic($param);

        $order_details = $this->orderDetailRepository->getOrderDetailStatistic($param);

        $data['order_details'] = $order_details;

        $suppliers = $this->supplierRepository->getSupplierStatistic();

        foreach ($suppliers as $supplier) {
            $data['supplier'][$supplier->name]['quantity'] = 0;
            $data['supplier'][$supplier->name]['revenue'] = 0;
            $data['supplier'][$supplier->name]['profit'] = 0;
        }

        foreach ($order_details as $order_detail) {
            $data['supplier'][$order_detail->productDetail->product->supplier->name]['quantity'] = $data['supplier'][$order_detail->productDetail->product->supplier->name]['quantity'] + $order_detail->quantity;
            $data['supplier'][$order_detail->productDetail->product->supplier->name]['revenue'] = $data['supplier'][$order_detail->productDetail->product->supplier->name]['revenue'] + $order_detail->quantity * $order_detail->price;
            $data['supplier'][$order_detail->productDetail->product->supplier->name]['profit'] = $data['supplier'][$order_detail->productDetail->product->supplier->name]['profit'] + $order_detail->quantity * ($order_detail->price - $order_detail->productDetail->product->import_price);
        }

        return $data;
    }

    public function getDataByMonthYear(array $param)
    {
        if ($param['month'] != null && $param['year'] == null) {
            $carbon = Carbon::createFromDate(date('Y'), $param['month'], 1);
            $data = $this->getInfoStatistic($param, $carbon);

        } elseif ($param['month'] != null && $param['year'] != null) {
            $carbon = Carbon::createFromDate($param['year'], $param['month'], 1);
            $data = $this->getInfoStatistic($param, $carbon);
        } elseif ($param['month'] == null && $param['year'] == null) {
            $carbon = new Carbon('first day of this month');
            $data = $this->getInfoStatistic($param, $carbon);
        } elseif ($param['month'] == null && $param['year'] != null) {
            $count_products = 0;
            $total_revenue = 0;
            $total_profit = 0;

            for($i = 0; $i < 12; $i++) {

                $data['labels'][] = 'Tháng '.($i + 1);

                $order_details = $this->orderDetailRepository->getPricesOrderDetailStatisticByMonth($i + 1);

                $revenue = 0;
                $profit = 0;

                foreach ($order_details as $order_detail) {
                    $revenue = $revenue + $order_detail->price * $order_detail->quantity;
                    $profit = $profit + $order_detail->quantity * ($order_detail->price - $order_detail->product_detail->import_price);
                    $count_products = $count_products + $order_detail->quantity;
                }

                $total_revenue = $total_revenue + $revenue;
                $total_profit = $total_profit + $profit;
                $data['revenues'][] = $revenue;
            }

            $data['count_products'] = $count_products;
            $data['total_revenue'] = $total_revenue;
            $data['total_profit'] = $total_profit;

            $data['count_orders'] = $this->orderRepository->getInfoOrderStatistic($param);

            $order_details = $this->orderDetailRepository->getOrderDetailStatisticByYear($param['year']);

            $data['order_details'] = $order_details;

            $suppliers = $this->supplierRepository->getSupplierStatistic();
            foreach ($suppliers as $supplier) {
                $data['supplier'][$supplier->name]['quantity'] = 0;
                $data['supplier'][$supplier->name]['revenue'] = 0;
                $data['supplier'][$supplier->name]['profit'] = 0;
            }

            foreach ($order_details as $order_detail) {
                $data['supplier'][$order_detail->productDetail->product->supplier->name]['quantity'] = $data['supplier'][$order_detail->productDetail->product->supplier->name]['quantity'] + $order_detail->quantity;
                $data['supplier'][$order_detail->productDetail->product->supplier->name]['revenue'] = $data['supplier'][$order_detail->productDetail->product->supplier->name]['revenue'] + $order_detail->quantity * $order_detail->price;
                $data['supplier'][$order_detail->productDetail->product->supplier->name]['profit'] = $data['supplier'][$order_detail->productDetail->product->supplier->name]['profit'] + $order_detail->quantity * ($order_detail->price - $order_detail->productDetail->product->import_price);
            }

            $data['text']['title1'] = 'Biểu Đồ Kinh Doanh Năm ' . $param['year'];
            $data['text']['title2'] = 'Danh Sách Sản Phẩm Xuất Kho Năm ' . $param['month'];
            $data['text']['revenue'] = 'DOANH THU NĂM';
            $data['text']['profit'] = 'LỢI NHUẬN NĂM';
        }

        return $data;
    }

    public function getInfoStatistic($param, $carbon)
    {
        $count_products = 0;
        $total_revenue = 0;
        $total_profit = 0;

        for ($i = 0; $i < $carbon->daysInMonth; $i++) {
            $date = $carbon->copy()->addDay($i)->format('d/m/Y');

            $data['labels'][] = $date;

            $param['day_of_month'] = $carbon->copy()->addDay($i)->format('Y-m-d');
            $order_details = $this->orderDetailRepository->getPricesOrderDetailStatistic($param);

            $revenue = 0;
            $profit = 0;

            if (!empty($order_details)) {
                foreach ($order_details as $order_detail) {
                    $revenue = $revenue + $order_detail->price * $order_detail->quantity;
                    $profit = $profit + $order_detail->quantity * ($order_detail->price - $order_detail->productDetail->product->import_price);
                    $count_products = $count_products + $order_detail->quantity;
                }
            }

            $total_revenue = $total_revenue + $revenue;
            $total_profit = $total_profit + $profit;
            $data['revenues'][] = $revenue;
        }

        $data['count_products'] = $count_products;
        $data['total_revenue'] = $total_revenue;
        $data['total_profit'] = $total_profit;

        $param['carbon_year'] = $carbon->year;
        $param['carbon_month'] = $carbon->month;

        $data['count_orders'] = $this->orderRepository->getInfoOrderStatistic($param);

        $order_details = $this->orderDetailRepository->getOrderDetailStatistic($param);

        $data['order_details'] = $order_details;

        $suppliers = $this->supplierRepository->getSupplierStatistic();

        foreach ($suppliers as $supplier) {
            $data['supplier'][$supplier->name]['quantity'] = 0;
            $data['supplier'][$supplier->name]['revenue'] = 0;
            $data['supplier'][$supplier->name]['profit'] = 0;
        }

        foreach ($order_details as $order_detail) {
            $data['supplier'][$order_detail->productDetail->product->supplier->name]['quantity'] = $data['supplier'][$order_detail->productDetail->product->supplier->name]['quantity'] + $order_detail->quantity;
            $data['supplier'][$order_detail->productDetail->product->supplier->name]['revenue'] = $data['supplier'][$order_detail->productDetail->product->supplier->name]['revenue'] + $order_detail->quantity * $order_detail->price;
            $data['supplier'][$order_detail->productDetail->product->supplier->name]['profit'] = $data['supplier'][$order_detail->productDetail->product->supplier->name]['profit'] + $order_detail->quantity * ($order_detail->price - $order_detail->productDetail->product->import_price);
        }

        $data['text']['title1'] = 'Biểu Đồ Kinh Doanh Tháng '.$param['month'].' Năm '.date('Y');
        $data['text']['title2'] = 'Danh Sách Sản Phẩm Xuất Kho Tháng '.$param['month'].' Năm '.date('Y');
        $data['text']['revenue'] = 'DOANH THU THÁNG';
        $data['text']['profit'] = 'LỢI NHUẬN THÁNG';

        return $data;
    }
}
