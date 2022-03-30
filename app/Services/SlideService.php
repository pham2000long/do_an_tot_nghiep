<?php

namespace App\Services;

use App\Repositories\SlideContract;

class SlideService implements SlideServiceInterface
{
    protected $slideRepository;

    /**
     * create a new instance
     *
     * @param SlideContract $slideRepository
     */
    public function __construct(SlideContract $slideRepository)
    {
        $this->slideRepository = $slideRepository;
    }

    public function paginateSlides(array $params)
    {
        $slides = $this->slideRepository->paginateSlides($params);

        return $slides;
    }

    public function create($request)
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
            return false;
        }

        return true;
    }

    public function findSlideById(int $id)
    {
        $slide = $this->slideRepository->findById($id);

        if (empty($slide)) {
            return false;
        }

        return $slide;
    }

    public function update($request, $id)
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
            return ['Đã xảy ra lỗi hệ thống không thể sửa slide', false];
        }

        return ['Sửa slide thành công!', true];
    }

    public function delete(int $id)
    {
        $slide = $this->slideRepository->findById($id);

        if (empty($slide)) {
            return ['Slide không tồn tại!', false];
        }

        try {
            $this->slideRepository->destroy($id);
        } catch (\Exception $exception) {
            return ['Đã xảy ra lỗi hệ thống không thể xóa slide', false];
        }

        return ['Xóa slide thành công!', true];
    }
}
