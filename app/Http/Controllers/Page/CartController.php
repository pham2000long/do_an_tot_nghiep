<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Repositories\ProductContract;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Http\Response;

class CartController extends Controller
{
    protected $productRepository;

    public function __construct(
        ProductContract $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    /**
     * add to Cart
     *
     * @param Request $request
     * return json
     */
    public function addCart(Request $request)
    {
        $productId = $request->product['id'];
        $product = $this->productRepository->findById($productId);
        $productDetail = $product->productDetails->first();
        $priceFinal = $product->sale_price;
        if (isset($product->promotion)) {
            if (
                $product->promotion->status
                && now()->gte($product->promotion->started_at)
                && now()->lte($product->promotion->ended_at)
            ) {
                if ($product->promotion->promotion_method) {
                    $priceFinal = $product->sale_price - ($product->sale_price * $product->promotion->price / 100);
                } else {
                    $priceFinal = $product->sale_price - $product->promotion->price;
                }
            }
        }
        $carts = Cart::content();
        $oldCart = $carts->first(function ($cart) use ($productId) {
            return $cart->id == $productId;
        });
        if (isset($oldCart)) {
            $rowId = $oldCart->rowId;

            Cart::update($rowId, [
                'qty' => $oldCart->qty + 1,
                'price' => ($oldCart->price / $oldCart->qty) * ($oldCart->qty + 1)
            ]);
        } else {
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'qty' => 1,
                'price' => $priceFinal,
                'weight' => 550,
                'options' => [
                    'image' => $product->image,
                    'sale_price' => $product->sale_price,
                    'final_price' => $priceFinal,
                    'product_detail_id' => $request->product_detail_id ? $request->product_detail_id : $productDetail->id
                ],
            ]);
        }
        $carts = Cart::content();
        // Cart::destroy();
        return view('pages.cart', compact('carts'));
    }

    public function delete($id)
    {
        $carts = Cart::content();
        $oldCart = $carts->first(function ($cart) use ($id) {
            return $cart->id == $id;
        });
        if (isset($oldCart)) {
            $rowId = $oldCart->rowId;
            Cart::remove($rowId);
        }
        $carts = Cart::content();
        // Cart::destroy();
        return view('pages.cart', compact('carts'));
    }

    public function updateQuantity(Request $request)
    {
        $cart = Cart::get($request->rowId);
        Cart::update($request->rowId, [
            'qty' => $request->quantity,
            'price' => ($cart->price / $cart->qty) * $request->quantity
        ]);

        $carts = Cart::content();
        // Cart::destroy();
        return view('pages.cart', compact('carts'));
    }
}
