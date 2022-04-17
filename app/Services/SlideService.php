<?php

namespace App\Services;

use App\Repositories\SlideContract;
use App\Repositories\SnapshotContract;

class SlideService implements SlideServiceInterface
{
    protected $slideRepository;
    protected $snapshotRepository;

    /**
     * create a new instance
     *
     * @param SlideContract $slideRepository
     */
    public function __construct(
        SlideContract $slideRepository,
        SnapshotContract $snapshotRepository
    ) {
        $this->slideRepository = $slideRepository;
        $this->snapshotRepository = $snapshotRepository;
    }

    public function paginateSlides(array $params)
    {
        $slides = $this->slideRepository->paginateSlides($params);

        return $slides;
    }

    public function create($request)
    {
        $image = $this->snapshotRepository->uploadThumb($request->image, 'slides');

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

        if(!empty($request->image)) {
            $this->snapshotRepository->deleteThumb($request->thumb_current, 'slides');
            $image = $this->snapshotRepository->uploadThumb($request->image, 'slides');
        } else {
            $image = $request->thumb_current;
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

    public function updateStatus(array $params)
    {
        $slide = $this->slideRepository->findById($params['id']);

        if (empty($slide)) {
            return ['Slide không tồn tại!', false];
        }
        try {
            $slide->status = $params['status'];
            $slide->save();
        } catch (\Exception $exception) {
            \Log::error($exception);
            return ['Đã xảy ra lỗi hệ thống không thể sửa slide', false];
        }

        return ['Sửa trạng thái thành công', true];
    }
}
