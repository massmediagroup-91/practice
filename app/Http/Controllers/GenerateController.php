<?php

namespace App\Http\Controllers;

use App\Services\GenerateService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GenerateController extends Controller
{
    private GenerateService $service;

    public function __construct(GenerateService $generateService)
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
