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
        $productId = $request->id;
        $product = $this->productRepository->findById($productId);
        $price = $product->sale_price;
        if (isset($product->promotion)) {
            if (
                $product->promotion->status
                && now()->gte($product->promotion->started_at)
                && now()->lte($product->promotion->endted_at)
            ) {
                if ($product->promotion->promoion_method) {
                    $price = $product->sale_price - ($product->sale_price * $product->promotion->price / 100);
                } else {
                    $price = $product->sale_price - $product->promotion->price;
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
                'price' => $price,
                'weight' => 550,
                'options' => [
                    'image' => $product->image,
                    'sale_price' => $product->sale_price
                ],
            ]);
        }

        return response()->json([
            'message' => 'Thêm giỏ hàng thành công'
        ], 200);
    }

    public function showCart()
    {
        $data = Cart::content();

        return response()->json($data, 200);
    }
}
