<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SupplierCreateRequest;
use App\Http\Requests\Admin\SupplierUpdateRequest;
use App\Repositories\SupplierContract;

class SupplierController extends Controller
{
    protected $supplierRepository;

    public function __construct(SupplierContract $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = $this->supplierRepository->all();
        return view('admins.suppliers.index', [
            'title' => 'Nhà cung cấp'
        ], compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.suppliers.create', [
            'title' => 'Nhà cung cấp'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SupplierCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierCreateRequest $request)
    {
        try {
            $this->supplierRepository->create($request->validated());
        } catch (\Exception $exception) {
            \Log::error($exception);
            return redirect()->route('suppliers.create')->with('error', 'Đã xảy ra lỗi hệ thống không thể thêm nhà cung cấp');
        }

        return redirect()->route('suppliers.index')->with('success', 'Thêm mới nhà cung cấp thành công!');
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
        $supplier = $this->supplierRepository->findById($id);

        return view('admins.suppliers.edit', compact('supplier'), [
            'title' => 'Nhà cung cấp'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SupplierUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierUpdateRequest $request, $id)
    {

        $supplier = $this->supplierRepository->findById($id);

        try {
            $this->supplierRepository->update($supplier, $request->validated());
        } catch (\Exception $exception) {
            \Log::error($exception);
            return back()->with('error', 'Đã xảy ra lỗi hệ thống không thể sửa nhà cung cấp');
        }

        return redirect()->route('suppliers.index')->with('success', 'Sửa thông tin nhà cung cấp thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->supplierRepository->destroy($id);
    }
}
