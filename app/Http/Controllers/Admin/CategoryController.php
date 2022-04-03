<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryCreateRequest;
use App\Http\Requests\Admin\CategoryIndexRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Services\CategoryServiceInterface;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryServiceInterface $categoryService)
    {
        $this->categoryService = $categoryService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryIndexRequest $request)
    {
        $categories = $this->categoryService->paginateCategories($request->all());
        return view('admins.categories.index', [
            'title' => 'Danh mục'
        ], compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.categories.create', [
            'title' => 'Danh mục'
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
        list($message, $success) = $this->categoryService->create($request->all());

        return $success ? redirect()->route('categories.index')->with('success', $message)
            : back()->with('error', $message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        list($success, $category) = $this->categoryService->findById($id);

        return $success ? view('admins.categories.edit', compact('category'), ['title' => 'Danh mục'])
            : back()->with('error', 'Danh mục không tồn tại');
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
        list($message, $success) = $this->categoryService->update($id, $request->all());

        return $success ? redirect()->route('categories.index')->with('success', $message)
            : back()->with('error', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        list($message, $success) = $this->categoryService->delete($id);
        return $success ? redirect()->route('categories.index')->with('success', $message)
            : back()->with('error', $message);
    }
}
