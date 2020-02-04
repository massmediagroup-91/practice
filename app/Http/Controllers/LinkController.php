<?php

namespace App\Http\Controllers;

use App\Services\LinkService;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    private LinkService $service;

    public function __construct(LinkService $linkService)
    {
        $this->service = $linkService;
    }

    public function generateStaticLink(int $id): RedirectResponse
    {
        $this->service->generateStaticLink($id);

        return redirect()->route('file.details', [$id]);
    }

    public function checkStaticLink(string $token): string
    {
        return $this->service->checkStaticLink($token);
    }

    public function checkDisposableLink(string $token): string
    {
       return $this->service->checkDisposableLink($token);
    }

    public function generateDisposableLink(int $id): RedirectResponse
    {
        $this->service->generateDisposableLink($id);

        return redirect()->route('file.details', [$id]);
    }
}
