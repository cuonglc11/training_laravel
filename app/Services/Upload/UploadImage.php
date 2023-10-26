<?php

namespace App\Services\Upload;

use App\Services\Service;
use Illuminate\Support\Facades\File;
use function League\Flysystem\delete;

class UploadImage extends Service
{
    public function upload($file, $move)
    {
        $ext = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $ext;
        $file->move($move, $fileName);
        return $fileName;
    }

    public function update($path, $file, $move)
    {
        if (File::exists($path)) {
            File::delete($path);
        }
        $ext = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $ext;
        $file->move($move, $fileName);
        return $fileName;
    }
}
