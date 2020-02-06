<?php

namespace App\Http\Controllers;

use App\Services\GenerateLinkService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GenerateLinkController extends Controller
{
    private GenerateLinkService $service;

    public function __construct(GenerateLinkService $generateService)
    {
        $this->service = $generateService;
    }

    public function generateStaticLink(int $id): RedirectResponse
    {
        $this->service->generateStaticLink($id);

        return redirect()->route('file.details', [$id]);
    }

    public function generateDisposableLink(int $id): RedirectResponse
    {
        $this->service->generateDisposableLink($id);

        return redirect()->route('file.details', [$id]);
    }
}
