<?php


namespace App\Services;


use App\File;
use App\FileToken;
use App\View;

class ReportService
{
    public function countOfView(): int
    {
        return View::query()->sum('view');
    }

    public function countOfFiles(): int
    {
        return File::query()->count();
    }

    public function countOfDeletedFiles(): int
    {
        return File::query()->onlyTrashed()->count();
    }

    public function countOfDisposableLink(): int
    {
        return FileToken::query()->where('type', FileToken::TYPE_DISPOSABLE)->count();
    }

    public function countOfDeletedDisposableLink(): int
    {
        return FileToken::query()->where('type', FileToken::TYPE_DISPOSABLE)->onlyTrashed()->count();
    }
}
