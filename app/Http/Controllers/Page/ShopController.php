<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Repositories\ProductContract;
use Illuminate\Support\Facades\Request;

class ShopController extends Controller
{
    protected $productRepository;
    protected $slideRepository;

    public function __construct(
        ProductContract $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request)
    {
        // $products = $this->productRepository->getAllProduct($request->all());

        return view('pages.shop');
    }
}
