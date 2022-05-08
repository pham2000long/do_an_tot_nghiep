<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductIndexRequest;
use App\Models\Category;
use App\Models\ProductType;
use App\Models\Supplier;
use App\Services\ProductImageServiceInterface;
use App\Services\ProductServiceInterface;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;
    protected $productImageService;

    public function __construct(
        ProductServiceInterface $productService,
        ProductImageServiceInterface $productImageService
    ) {
        $this->productService = $productService;
        $this->productImageService = $productImageService;
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

    public function edit(int $id)
    {
        $product = $this->productService->findProductById($id);
        $categories = Category::all();
        $productTypes = ProductType::all();
        $suppliers = Supplier::all();

        if (empty($product)) {
            return back()->with('error', 'Sản phẩm không tồn tại!');
        }

        return view('admins.products.edit', compact('product', 'categories', 'productTypes', 'suppliers'), [
            'title' => 'Sản phẩm'
        ]);
    }

    public function update(int $id, Request $request)
    {
        list($message, $success) = $this->productService->update($id, $request->all());

        return $success ? redirect()->route('products.index')->with('success', $message)
            : back()->with('error', $message);
    }

    public function deleteProductImage(Request $request){
        $this->productImageService->deleteImage($request->key);
        return response()->json([
            'message' => 'Xóa ảnh thành công!'
        ]);
    }

    public function updateStatus(Request $request)
    {
        list($message, $success) = $this->productService->updateStatus($request->all());

        return $success ? response()->json([
            'success' => $message
        ]) : response()->json([
            'error' => $message
        ]);
    }

    public function delete($id)
    {
        list($message, $success) = $this->productService->delete($id);

        return $success ? redirect()->route('products.index')->with('success', $message)
            : back()->with('error', $message);
    }

    public function inventory()
    {
        $products = $this->productService->getAllProductsInventory();

        return view('admins.products.inventory', compact('products'), [
            'title' => 'Sản phẩm tồn kho'
        ]);
    }

    public function detail($id)
    {
        $product = $this->productService->findProductById($id);

        if (empty($product)) {
            return back()->with('error', 'Sản phẩm không tồn tại!');
        }
        return view('admins.products.detail', compact('product'), [
            'title' => 'Chi tiết sản phẩm'
        ]);
    }
}
