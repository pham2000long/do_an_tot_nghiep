<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\OrderServiceInterface;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderServiceInterface $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(Request $request)
    {
        $orders = $this->orderService->getAllOrders($request->all());
        return view('admins.orders.index', [
            'title' => 'Danh sách đơn hàng'
        ], compact('orders'));
    }

    public function show($id)
    {
        $order = $this->orderService->getOrderById($id);
        if (empty($order)) {
            return redirect()->back()->with([
                'error' => 'Đơn hàng không tồn tại!'
            ]);
        }
        return view('admins.orders.detail', [
            'title' => 'Chi tiết đơn hàng'
        ], compact('order'));
    }

    public function edit($id)
    {
        $order = $this->orderService->getOrderById($id);

        if (empty($order)) {
            return back()->with('error', 'Không tồn tại đơn hàng');
        }
        return view('admins.orders.edit', compact('order'), [
            'title' => 'Sửa thông tin đơn hàng'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SlideUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        list($message, $success) = $this->orderService->update($request->all(), $id);
        return $success ? redirect()->route('orders.index')->with('success', $message)
            : back()->with('error', $message);
    }
}
