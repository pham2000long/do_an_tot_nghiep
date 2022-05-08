<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repositories\ProductTypeContract;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    protected $productTypeRepository;

    public function __construct(ProductTypeContract $productTypeRepository)
    {
        $this->productTypeRepository = $productTypeRepository;
    }

    public function getProductType($id)
    {
        $categories = Category::all();

        $productType = $this->productTypeRepository->findById($id);

        if (empty($productType)) {
            return redirect()->back()->with([
                'error' => 'Loại sản phẩm không tồn tại!'
            ]);
        }
        return view('pages.product_types.product_type', compact('categories', 'productType'));
    }
}
