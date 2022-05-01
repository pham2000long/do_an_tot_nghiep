<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\PromotionServiceInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected $promotionService;

    public function __construct(PromotionServiceInterface $promotionService)
    {
        $this->promotionService = $promotionService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $promotions = $this->promotionService->paginatePromotions($request->all());
        return view('admins.promotions.index', [
            'title' => 'Khuyến mãi'
        ], compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admins.promotions.create', [
            'title' => 'Khuyến mãi'
        ], compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $success = $this->promotionService->create($request->all());

        return $success ? redirect()->route('promotions.index')->with('success', 'Thêm mới khuyến mãi thành công!')
            : redirect()->route('promotions.create')->with('error', 'Đã xảy ra lỗi hệ thống không thể tạo khuyến mãi!');
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
        $promotion = $this->promotionService->findPromotionById($id);
        $categories = Category::all();

        if (!$promotion) {
            return back()->with('error', 'Không tồn tại slide');
        }
        return view('admins.promotions.edit', compact('promotion', 'categories'), [
            'title' => 'Khuyến mại'
        ]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        list($message, $success) = $this->promotionService->update($request->all(), $id);
        return $success ? redirect()->route('promotions.index')->with('success', $message)
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
        list($message, $success) = $this->promotionService->delete($id);

        return $success ? redirect()->route('promotions.index')->with('success', $message)
            : back()->with('error', $message);
    }

    public function updateStatus(Request $request)
    {
        list($message, $success) = $this->promotionService->updateStatus($request->all());

        return $success ? response()->json([
            'success' => $message
        ]) : response()->json([
            'error' => $message
        ]);
    }
}
