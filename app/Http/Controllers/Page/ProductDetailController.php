<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Repositories\ProductContract;
use Illuminate\Support\Facades\Request;

class ProductDetailController extends Controller
{
    protected $productRepository;
    protected $slideRepository;

    public function __construct(
        ProductContract $productRepository
    ) {
        $this->productRepository = $productRepository;
    }

    public function findProductDetail($id)
    {
        $product = $this->productRepository->findById($id);
        $productCategories = $this->productRepository->getByCategoryId($product->category->id);
        if (empty($product)) {
            return back()->with('error', 'Sản phẩm này không tồn tại');
        }

        return view('pages.products.product_detail', compact('product', 'productCategories'));
    }
}
