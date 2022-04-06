<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Supplier;
use App\Repositories\ProductContract;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(
        ProductContract $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();
        return view('admins.products.index', compact('products'), [
            'title' => 'Sản phẩm'
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $productTypes = ProductType::all();
        $suppliers = Supplier::all();

        return view('admins.products.create', compact('categories', 'productTypes', 'suppliers'), [
            'title' => 'Sản phẩm'
        ]);
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
