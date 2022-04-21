<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slide;
use App\Services\CategoryServiceInterface;
use App\Services\ProductServiceInterface;
use App\Services\SlideServiceInterface;
use Illuminate\Support\Facades\Request;

class HomeController extends Controller
{
    protected $slideService;
    protected $categoryService;
    protected $productService;

    public function __construct(
        SlideServiceInterface $slideService,
        CategoryServiceInterface $categoryService,
        ProductServiceInterface $productService
    ) {
        $this->slideService = $slideService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }
    public function index(Request $request)
    {
        $slides = Slide::all();
        $categories = Category::all();
        $products = $this->productService->getLimitProducts(6);

        return view('pages.home', compact('slides', 'categories', 'products'));
    }
}
