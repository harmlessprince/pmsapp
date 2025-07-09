<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadFileRequest;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(UploadFileRequest $request)
    {
        if ($request->hasFile('image')) {
            $response = FileUploadService::uploadToS3($request->file('image'), 'profile_images');
            $image = $response->path;
            return sendSuccess(['path' => $image], 'File successfully uploaded');
        }
        return sendError('file path is required');
    }
}
