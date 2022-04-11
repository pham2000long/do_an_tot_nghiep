<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductIndexRequest;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Supplier;
use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(
        ProductServiceInterface $productService
    ) {
        $this->productService = $productService;
    }

    public function index(ProductIndexRequest $request)
    {
        $products = $this->productService->getAllProducts($request->all());

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
        list($message, $success) = $this->productService->create($request->all());

        return $success ? redirect()->route('products.index')->with('success', $message)
            : back()->with('error', $message);
    }
}
