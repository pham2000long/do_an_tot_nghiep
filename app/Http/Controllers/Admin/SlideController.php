<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SlideCreateRequest;
use App\Http\Requests\Admin\SlideUpdateRequest;
use App\Models\Slide;
use App\Repositories\SlideContract;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    protected $slideRepository;
    protected $userRepository;

    public function __construct(SlideContract $slideRepository)
    {
        $this->slideRepository = $slideRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = $this->slideRepository->all();
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
        if ($request->hasFile('image')) {
            $completeFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/uploads/slides', $compPic);
            $image = $compPic;
        }

        try {
            $this->slideRepository->create([
                'name' => $request->name,
                'link' => $request->link,
                'image' => $image,
                'description' => $request->description,
                'status' => $request->status
            ]);
        } catch (\Exception $exception) {
            \Log::error($exception);
            return redirect()->route('slides.create')->with('error', 'Đã xảy ra lỗi hệ thống không thể tạo slide');
        }

        return redirect()->route('slides.index')->with('success', 'Thêm mới slide thành công!');
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
        $slide = $this->slideRepository->findById($id);

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

        $slide = $this->slideRepository->findById($id);

        if ($request->hasFile('image')) {
            $completeFileName = $request->file('image')->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic = str_replace(' ', '_', $fileNameOnly).'-'. rand() .'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/uploads/slides', $compPic);
            $image = $compPic;
        }

        try {
            $this->slideRepository->update($slide, [
                'name' => $request->name,
                'link' => $request->link,
                'image' => isset($image) ? $image : $slide->image,
                'description' => $request->description,
                'status' => $request->status
            ]);
        } catch (\Exception $exception) {
            \Log::error($exception);
            dd($exception);
            return back()->with('error', 'Đã xảy ra lỗi hệ thống không sửa slide');
        }

        return redirect()->route('slides.index')->with('success', 'Sửa slide thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->slideRepository->destroy($id);
    }

    public function updateStatus(Request $request)
    {
        $slide = $this->slideRepository->findById($request->id);
        $slide->status = $request->status;
        $slide->save();

        return response()->json([
            'success' => 'Update status thành công'
        ]);
    }
}
