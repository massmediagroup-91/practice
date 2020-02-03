<?php

namespace App\Http\Controllers;

use App\File;
use App\View;
use App\FileToken;
use App\Http\Requests\StoreUserFileRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): \Illuminate\Contracts\Support\Renderable
    {
        $files = File::query()
            ->where('user_id', auth()->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $countOfFiles = File::query()
            ->where('user_id', auth()->user()->id)
            ->count();

        return view('home', [
            'files' => $files,
            'countOfFiles' => $countOfFiles
        ]);
    }

    /**
     * @param StoreUserFileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserFileRequest $request): \Illuminate\Http\RedirectResponse
    {
        $file = new File;

        $file->name = $request->file('name')->store('files', 'public');
        $file->comment = $request->get('comment');
        $file->deleted_at = $request->get('deleted_at');
        $file->user_id = $request->user()->id;

        $file->save();

        return redirect()->route('home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(): Renderable
    {
        return view('form');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getFileDetails(int $id): \Illuminate\Contracts\Support\Renderable
    {
        $file = File::query()->find($id);

        $link = FileToken::query()
            ->where('file_id', $id)
            ->where('type', FileToken::TYPE_STATIC)
            ->first();

        $disposableLinks = FileToken::query()
            ->where('file_id', $id)
            ->where('type', FileToken::TYPE_DISPOSABLE)
            ->get();

        $views = View::query()
            ->where('file_id', $id)
            ->first();

        if ($link) {
            $link = route('check.link', [$link->token]);
        }

        return view('details', [
            'file' => $file ?? [],
            'link' => $link ?? '',
            'views' => $views ?? 0,
            'disposableLinks' => $disposableLinks ?? ''
        ]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function generateLink(int $id): \Illuminate\Http\RedirectResponse
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

        return redirect()->route('file.details', [$id]);
    }

    /**
     * @param $token
     * @return string|void
     */
    public function checkLink(string $token): string
    {
        $link = FileToken::query()
            ->where('token', $token)
            ->where('type', FileToken::TYPE_STATIC)
            ->first();

        if ($link) {
            $file = File::query()
                ->where('id', $link->file_id)
                ->first();

            return "<img src=http://localhost/storage/$file->name alt='$file->name'>";
        }

        return abort(404);
    }

    /**
     * @param $token
     * @return string|void
     */
    public function checkDisposableLink(string $token): string
    {
        $link = FileToken::query()
            ->where('token', $token)
            ->where('type', FileToken::TYPE_DISPOSABLE)
            ->first();

        if ($link) {
            $file = File::query()
                ->where('id', $link->file_id)
                ->first();

            FileToken::query()
                ->where('token', $token)
                ->where('type', FileToken::TYPE_DISPOSABLE)
                ->delete();

            return "<img src=http://localhost/storage/$file->name alt='$file->name'>";
        }

        return abort(404);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function generateDisposableLink(int $id): RedirectResponse
    {
        $fileToken = new FileToken;

        $fileToken->token = md5(random_int(1, 10) . microtime());
        $fileToken->file_id = $id;
        $fileToken->type = FileToken::TYPE_DISPOSABLE;

        $fileToken->save();

        return redirect()->route('file.details', [$id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(int $id): Response
    {
        try {
            File::query()
                ->where('id', $id)
                ->delete();

            FileToken::query()
                ->where('file_id', $id)
                ->delete();

        } catch (\Exception $e) {
            return response($e->getMessage());
        }

        return redirect()->route('home');
    }
}
