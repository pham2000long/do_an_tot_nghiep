<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SlideCreateRequest;
use App\Http\Requests\Admin\SlideIndexRequest;
use App\Http\Requests\Admin\SlideUpdateRequest;
use App\Services\SlideServiceInterface;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    protected $slideService;

    public function __construct(SlideServiceInterface $slideService)
    {
        $this->slideService = $slideService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SlideIndexRequest $request)
    {
        $slides = $this->slideService->paginateSlides($request->all());

        return view('admins.slides.index', [
            'title' => 'Slide'
        ], compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.slides.create', [
            'title' => 'Slide'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  SlideCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideCreateRequest $request)
    {
        $success = $this->slideService->create($request);

        return $success ? redirect()->route('slides.index')->with('success', 'Thêm mới slide thành công!')
            : redirect()->route('slides.create')->with('error', 'Đã xảy ra lỗi hệ thống không thể tạo slide');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slide = $this->slideService->findSlideById($id);

        if (empty($slide)) {
            return back()->with('error', 'Không tồn tại slide');
        }
        return view('admins.slides.edit', compact('slide'), [
            'title' => 'Slide'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SlideUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideUpdateRequest $request, $id)
    {
        list($message, $success) = $this->slideService->update($request, $id);
        return $success ? redirect()->route('slides.index')->with('success', $message)
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
        list($message, $success) = $this->slideService->delete($id);

        return $success ? redirect()->route('slides.index')->with('success', $message)
            : back()->with('error', $message);
    }

    public function updateStatus(Request $request)
    {
        list($message, $success) = $this->slideService->updateStatus($request->all());

        return $success ? response()->json([
            'success' => $message
        ]) : response()->json([
            'error' => $message
        ]);
    }
}
