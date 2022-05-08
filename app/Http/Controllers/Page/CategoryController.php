<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryContract;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getCategory($id)
    {
        $category = $this->categoryRepository->findById($id);

        if (empty($category)) {
            return redirect()->back()->with([
                'error' => 'Danh mục không tồn tại!'
            ]);
        }
        return view('pages.categories.category', compact('category'));
    }
}
