<?php

namespace App\Services;

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    /**
     * @throws CustomException
     */
    public static function uploadToS3($image, $directory = 'general'): object
    {

        try {
            $s3 = Storage::disk('s3');
            $imageFileName = time() . '.' . $image->getClientOriginalExtension();
            $pathToImage = 'public/storage/' . $directory . '/' . $imageFileName;

            $resp = $s3->put($pathToImage, file_get_contents($image), 'public');
            if (!$resp) {
                throw new CustomException('Error occurred while uploading the image');
            }
            return (object)['url' => Storage::url($pathToImage), 'path' => $pathToImage];
        } catch (\Throwable $th) {
            Log::error($th);
            return (object)['url' => null, 'path' => null];
        }
    }
}
