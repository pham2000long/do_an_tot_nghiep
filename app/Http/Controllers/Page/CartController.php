<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
use Illuminate\Http\Response;

class CartController extends Controller
{
    /**
     * add to Cart
     *
     * @param Request $request
     * return json
     */
    public function addCart(Request $request)
    {
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => 1,
            'price' => 3,
            'weight' => 550,
            // 'options' => [
            //     'old_price' => isset($request->promotion_price) && $request->promotion_price != 0 ? $request->unit_price : null,
            //     'image' => $request->images[0]['image'],
            //     'category' => $request->category['name'],
            // ],
        ]);

        return response()->json([], 200);
    }

    /**
     *
     */
    public function updateCart()
    {


    }
    /**
     *
     */
    public function deleteCart()
    {

    }

    /**
     *
     */
    public function removeCart()
    {

    }
}
