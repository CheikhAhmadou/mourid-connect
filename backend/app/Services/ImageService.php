<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;

class ImageService
{
    public function store(UploadedFile $file, string $folder, int $maxWidth = 1200): string
    {
        $filename = $folder.'/'.Str::uuid().'.'.$file->getClientOriginalExtension();

        $image = Image::read($file);

        if ($image->width() > $maxWidth) {
            $image->scale(width: $maxWidth);
        }

        $image->save(storage_path('app/public/'.$filename));

        return $filename;
    }

    public function storeThumbnail(UploadedFile $file, string $folder, int $size = 400): string
    {
        $filename = $folder.'/thumb_'.Str::uuid().'.'.$file->getClientOriginalExtension();

        Image::read($file)
            ->cover($size, $size)
            ->save(storage_path('app/public/'.$filename));

        return $filename;
    }

    public function delete(string $path): void
    {
        $fullPath = storage_path('app/public/'.$path);

        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }
}
