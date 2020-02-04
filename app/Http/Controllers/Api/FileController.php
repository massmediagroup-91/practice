<?php

namespace App\Http\Controllers\Api;

use App\File;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserFileRequest;
use App\Services\FileService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class FileController extends Controller
{
    private FileService $service;

    public function __construct(FileService $fileService)
    {
        $this->service = $fileService;
    }

    public function upload(StoreUserFileRequest $request): JsonResponse
    {
        $file = $this->service->upload($request->all(), $request->file('name'));

        return response()->json(['file_id' => $file->id], 200);
    }

    public function download(int $fileId): BinaryFileResponse
    {
        $file = File::query()
            ->where('id', $fileId)
            ->firstOrFail('name');

        return response()->download(storage_path('app/public/' . $file->name));
    }

    public function destroy(int $id): JsonResponse {
        $this->service->destroy($id);

        return response()->json([
            'status' => 'success',
            'message' => 'File deleted successful'
        ]);
    }
}
