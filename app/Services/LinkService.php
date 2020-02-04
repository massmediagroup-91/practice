<?php

namespace App\Services;

use App\File;
use App\FileToken;

class LinkService
{
    public function generateStaticLink(int $id): FileToken
    {
        FileToken::query()
            ->where('file_id', $id)
            ->where('type', FileToken::TYPE_STATIC)
            ->delete();

        $fileToken = new FileToken;

        $fileToken->token = md5(random_int(1, 10) . microtime());
        $fileToken->file_id = $id;
        $fileToken->type = FileToken::TYPE_STATIC;

        $fileToken->save();

        return $fileToken;
    }

    public function generateDisposableLink(int $id): FileToken
    {
        $fileToken = new FileToken;

        $fileToken->token = md5(random_int(1, 10) . microtime());
        $fileToken->file_id = $id;
        $fileToken->type = FileToken::TYPE_DISPOSABLE;

        $fileToken->save();

        return $fileToken;
    }

    public function checkStaticLink(string $token): ?string
    {
        $link = FileToken::query()
            ->where('token', $token)
            ->where('type', FileToken::TYPE_STATIC)
            ->firstOrFail();

        if ($link) {
            $file = File::query()
                ->where('id', $link->file_id)
                ->firstOrFail();

            return '<img src=' . asset("/storage/$file->name") . " alt='$file->name'>";
        }

        return null;
    }

    public function checkDisposableLink(string $token): ?string
    {
        $link = FileToken::query()
            ->where('token', $token)
            ->where('type', FileToken::TYPE_DISPOSABLE)
            ->firstOrFail();

        if ($link) {
            $file = File::query()
                ->where('id', $link->file_id)
                ->firstOrFail();

            FileToken::query()
                ->where('token', $token)
                ->where('type', FileToken::TYPE_DISPOSABLE)
                ->delete();

            return '<img src=' . asset("/storage/$file->name") . " alt='$file->name'>";
        }

        return null;
    }
}
