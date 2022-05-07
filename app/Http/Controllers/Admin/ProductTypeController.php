<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductTypeCreateRequest;
use App\Http\Requests\Admin\ProductTypeUpdateRequest;
use App\Repositories\CategoryContract;
use App\Repositories\ProductTypeContract;
use App\Repositories\SnapshotContract;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    protected $productTypeRepository;
    protected $categoryRepository;
    protected $snapshotRepository;

    public function __construct(
        ProductTypeContract $productTypeRepository,
        CategoryContract $categoryRepository,
        SnapshotContract $snapshotRepository
    ) {
        $this->productTypeRepository = $productTypeRepository;
        $this->categoryRepository = $categoryRepository;
        $this->snapshotRepository = $snapshotRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = $this->productTypeRepository->all();
        return view('admins.product_types.index', [
            'title' => 'Loại sản phẩm'
        ], compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->categoryRepository->all();
        return view('admins.product_types.create', compact('categories'), [
            'title' => 'Loại sản phẩm'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductTypeCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductTypeCreateRequest $request)
    {
        try {
            $image = $this->snapshotRepository->uploadThumb($request->image, 'product_types');
            $this->productTypeRepository->create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'image' => $image,
                'description' => $request->description
            ]);
        } catch (\Exception $exception) {
            dd($exception);
            \Log::error($exception);
            return redirect()->route('productTypes.create')->with('error', 'Đã xảy ra lỗi hệ thống không thể tạo loại sản phẩm');
        }

        return redirect()->route('productTypes.index')->with('success', 'Thêm mới loại sản phẩm thành công!');
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
        $productType = $this->productTypeRepository->findById($id);
        $categories = $this->categoryRepository->all();
        return view('admins.product_types.edit', compact('productType', 'categories'), [
            'title' => 'Loại sản phẩm'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductTypeUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductTypeUpdateRequest $request, $id)
    {
        $productType = $this->productTypeRepository->findById($id);

        if(!empty($request->image)) {
            $this->snapshotRepository->deleteThumb($request->thumb_current, 'product_types');
            $image = $this->snapshotRepository->uploadThumb($request->image, 'product_types');
        } else {
            $image = $request->thumb_current;
        }

        try {
            $this->productTypeRepository->update($productType, [
                'category_id' => $request->category_id,
                'name' => $request->name,
                'image' => isset($image) ? $image : $productType->image,
                'description' => $request->description
            ]);
        } catch (\Exception $exception) {
            \Log::error($exception);

            return back()->with('error', 'Đã xảy ra lỗi hệ thống không sửa loại sản phẩm');
        }

        return redirect()->route('productTypes.index')->with('success', 'Sửa sản phẩm thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->productTypeRepository->destroy($id);
    }
}
