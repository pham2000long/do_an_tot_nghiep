<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\ProductContract;
use Illuminate\Http\Request;

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
        $categories = Category::all();
        $products = $this->productRepository->getAllProducts($request->all());

        return view('pages.shop', compact('categories', 'products'));
    }
}
