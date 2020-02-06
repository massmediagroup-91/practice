<?php


namespace App\Services;


use App\FileToken;

class GenerateService
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
}
