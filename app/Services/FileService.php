<?php

namespace App\Services;

use App\File;
use App\FileToken;
use App\View;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;

class FileService
{
    public function upload(array $data, UploadedFile $uploadedFile): File
    {
        $file = new File;

        $file->name = $uploadedFile->store('files', 'public');
        $file->comment = $data['comment'];
        $file->when_delete = $data['when_delete'] ?? null;
        $file->user_id = Auth::user()->id;

        $file->save();

        return $file;
    }

    public function destroy(int $id): void
    {
        FileToken::query()
            ->where('file_id', $id)
            ->delete();

        View::query()
            ->where('file_id', $id)
            ->delete();

        File::query()
            ->where('id', $id)
            ->delete();
    }
}
