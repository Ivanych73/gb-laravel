<?php

namespace App\Services;

use App\Services\Contract\Upload;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class UploadService implements Upload
{
    public function uploadImage(UploadedFile $file, $oldFile=null): string
    {
        if($oldFile) $this->removeImage($oldFile);
        $path = $file->storeAs('news', $file->hashName(), 'upload');
        if (!$path) {
            throw new UploadException('Ошибка загрузки файла');
        }
        return $path;
    }

    public function removeImage(string $path): bool
    {
        if (Storage::disk('upload')->exists($path)){            
            if(Storage::disk('upload')->delete($path)) {
                return true;
            }else {
                return false;
            }
        }
        return true;
    }
}
