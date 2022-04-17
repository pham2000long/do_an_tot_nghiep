<?php

namespace App\Repositories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SnapshotRepository implements SnapshotContract
{
    public function uploadThumb($thumbObj, $folderUpload)
    {
        $thumbName = $folderUpload . '_' . Str::random(20) . '.' . $thumbObj->clientExtension();
        $thumbObj->storeAs($folderUpload, $thumbName, "storage_image");
        return $thumbName;
    }

    public function uploadProductImages($thumbObj, $folderUpload)
    {
        $thumbName        = $folderUpload . '_' . Str::random(20) . '.' . $thumbObj->clientExtension();
        $thumbObj->storeAs($folderUpload, $thumbName, "storage_image");
        return $thumbName;
    }

    public function putThumb($thumbName, $data, $folderUpload)
    {
        Storage::disk('storage_image')->put($folderUpload . '/'. $thumbName, $data);
    }

    public function deleteThumb($thumbName, $folderUpload)
    {
        Storage::disk('storage_image')->delete($folderUpload . '/'. $thumbName);
    }

    public function deleteProductThumb($thumbName, $folderUpload)
    {
        Storage::disk('product_images')->delete($folderUpload . '/'. $thumbName);
    }
}
