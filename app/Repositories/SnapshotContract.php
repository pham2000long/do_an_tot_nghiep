<?php

namespace App\Repositories;

interface SnapshotContract
{
    public function uploadThumb($thumbObj, $folderUpload);

    public function uploadProductImages($thumbObj, $folderUpload);

    public function putThumb($thumbName, $data, $folderUpload);

    public function deleteThumb($thumbName, $folderUpload);

    public function deleteProductThumb($thumbName, $folderUpload);
}
