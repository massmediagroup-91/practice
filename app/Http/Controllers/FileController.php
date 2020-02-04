<?php

namespace App\Http\Controllers;

use App\File;
use App\Services\FileService;
use App\View;
use App\FileToken;
use App\Http\Requests\StoreUserFileRequest;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class FileController extends Controller
{
    private FileService $service;

    public function __construct(FileService $fileService)
    {
        $this->service = $fileService;
    }

    public function index(): Renderable
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

    public function store(StoreUserFileRequest $request): RedirectResponse
    {
        $this->service->upload($request->all(), $request->only('name')['name']);

        return redirect()->route('home');
    }

    public function create(): Renderable
    {
        return view('form');
    }

    public function getFileDetails(int $id): Renderable
    {
        $file = File::query()->find($id);

        $link = FileToken::query()
            ->where('file_id', $id)
            ->where('type', FileToken::TYPE_STATIC)
            ->firstOrFail();

        $disposableLinks = FileToken::query()
            ->where('file_id', $id)
            ->where('type', FileToken::TYPE_DISPOSABLE)
            ->get();

        $views = View::query()
            ->where('file_id', $id)
            ->firstOrFail();

        if ($link) {
            $link = route('check.static.link', [$link->token]);
        }

        return view('details', [
            'file' => $file ?? [],
            'link' => $link ?? '',
            'views' => $views,
            'disposableLinks' => $disposableLinks ?? ''
        ]);
    }

    public function destroy(int $id): RedirectResponse
    {
       $this->service->destroy($id);

        return redirect()->route('home');
    }
}
