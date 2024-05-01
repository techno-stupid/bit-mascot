<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;

trait FileUploadTrait
{
    public function uploadFile(UploadedFile $file): string
    {
        $filename = time() . '-' . $file->getClientOriginalName();
        $filePath = $file->storeAs('uploads', $filename, 'public');
        return "/storage/$filePath";
    }
}
