<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Mail\Order;
use App\Repositories\OrderContract;
use App\Repositories\OrderDetailContract;
use App\Repositories\ProductContract;
use App\Repositories\ProductDetailContract;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    protected $productRepository;
    protected $productDetailRepository;
    protected $orderRepository;
    protected $orderDetailRepository;

    public function __construct(
        ProductContract $productRepository,
        ProductDetailContract $productDetailRepository,
        OrderContract $orderRepository,
        OrderDetailContract $orderDetailRepository
    ) {
        $this->productRepository = $productRepository;
        $this->productDetailRepository = $productDetailRepository;
        $this->orderRepository = $orderRepository;
        $this->orderDetailRepository = $orderDetailRepository;
    }

    public function listCart()
    {
        $carts = Cart::content();
        return view('pages.checkouts.cart_items', compact('carts'));
    }

    public function delivery()
    {
        $carts = Cart::content();
        if (!Auth::check()) {
            return redirect()->route('users.login_index');
        }

        if ($carts->isEmpty()) {
            return redirect()->route('checkouts.cart_items');
        }
        return view('pages.checkouts.delivery', compact('carts'));
    }

    public function order(Request $request)
    {
        $user = Auth::user();
        $carts = Cart::content();
        if (empty($user) || !$carts->count()) {
            return redirect()->route('checkouts.cart_items');
        }

        $str = date('dmHis', strtotime(now()));

        try {
            $order = $this->orderRepository->create([
                'user_id' => $request->user_id,
                'order_code' => $request->user_id . $str,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'address' => $request->address
            ]);
            foreach ($carts as $cart) {
                $orderDetail = $this->orderDetailRepository->create([
                    'order_id' => $order->id,
                    'product_detail_id' => $cart->options->product_detail_id,
                    'quantity' => $cart->qty,
                    'price' => $cart->options->sale_price
                ]);

                $productDetail = $this->productDetailRepository->findById($orderDetail->product_detail_id);

                $productDetail->quantity = $productDetail->quantity - $orderDetail->quantity;
                $productDetail->save();
            }

            // send mail order to user
            Mail::send(new Order($user, $carts, $order));

        } catch (\Exception $exception) {
            \Log::error($exception);
            return back()->with('error', 'Đã xảy ra lỗi hệ thống!');
        }
        Cart::destroy();
        return view('pages.checkouts.receipt', compact('carts', 'order'));
    }
}
