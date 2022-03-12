<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Repositories\CategoryContract;
use App\Repositories\ProductTypeContract;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    protected $productTypeRepository;

    public function __construct(
        CategoryContract $categoryRepository,
        ProductTypeContract $productTypeRepository
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->productTypeRepository = $productTypeRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        return view('admins.categories.index', [
            'title' => 'Category'
        ], compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productTypes = $this->productTypeRepository->all();
        return view('admins.categories.create', compact('productTypes'), [
            'title' => 'Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryCreateRequest $request)
    {
        try {
            $this->categoryRepository->create($request->validated());
        } catch (\Exception $exception) {
            \Log::error($exception);
            return redirect()->route('categories.create')->with('error', 'Đã xảy ra lỗi hệ thống không thể tạo danh mục');
        }

        return redirect()->route('categories.index')->with('success', 'Thêm mới danh mục thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->findById($id);
        $productTypes = $this->productTypeRepository->all();

        return view('admins.categories.edit', compact('category', 'productTypes'), [
            'title' => 'Category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $category = $this->categoryRepository->findById($id);

        try {
            $this->categoryRepository->update($category, [
                'product_type_id' => $request->product_type_id,
                'name' => $request->name,
                'description' => $request->description
            ]);
        } catch (\Exception $exception) {
            \Log::error($exception);
            return back()->with('error', 'Đã xảy ra lỗi hệ thống không sửa danh mục');
        }

        return redirect()->route('categories.index')->with('success', 'Sửa danh mục thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);
    }
}
