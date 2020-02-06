<?php


namespace App\Services;


use App\File;
use App\FileToken;
use Illuminate\View\View;

class FindLinkService
{
    public function findStaticLink(string $token): ?string
    {
        $link = FileToken::query()
            ->where('token', $token)
            ->where('type', FileToken::TYPE_STATIC)
            ->firstOrFail();

        if ($link) {
            $file = File::query()
                ->where('id', $link->file_id)
                ->firstOrFail();

            return asset("storage/$file->path");
        }

        return null;
    }

    public function findDisposableLink(string $token): ?string
    {
        $link = FileToken::query()
            ->where('token', $token)
            ->where('type', FileToken::TYPE_DISPOSABLE)
            ->firstOrFail();

        if ($link) {
            $file = File::query()
                ->where('id', $link->file_id)
                ->firstOrFail();

            return asset("storage/$file->path");
        }

        return null;
    }

    public function disableDisposableLink(string $token): void
    {
        FileToken::query()
            ->where('token', $token)
            ->where('type', FileToken::TYPE_DISPOSABLE)
            ->delete();
    }
}
