<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductTypeCreateRequest;
use App\Http\Requests\Admin\ProductTypeUpdateRequest;
use App\Repositories\ProductTypeContract;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    protected $productTypeRepository;

    public function __construct(ProductTypeContract $productTypeRepository)
    {
        $this->productTypeRepository = $productTypeRepository;
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
            'title' => 'Product Type'
        ], compact('productTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.product_types.create', [
            'title' => 'Product Type'
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
            $this->productTypeRepository->create($request->validated());
        } catch (\Exception $exception) {
            \Log::error($exception);
            return redirect()->route('productTypes.create')->with('error', 'Đã xảy ra lỗi hệ thống không thể tạo Product type');
        }

        return redirect()->route('productTypes.index')->with('success', 'Thêm mới Product type thành công!');
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

        return view('admins.product_types.edit', compact('productType'), [
            'title' => 'Product Type'
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

        try {
            $this->productTypeRepository->update($productType, [
                'name' => $request->name,
                'description' => $request->description,
                'icon' => $request->icon
            ]);
        } catch (\Exception $exception) {
            \Log::error($exception);

            return back()->with('error', 'Đã xảy ra lỗi hệ thống không sửa product type');
        }

        return redirect()->route('productTypes.index')->with('success', 'Sửa product type thành công!');
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
