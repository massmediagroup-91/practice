<?php

namespace App\Http\Controllers;

use App\Services\FindAndDisableLinkService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FindAndDisableLinkController extends Controller
{
    private FindAndDisableLinkService $service;

    public function __construct(FindAndDisableLinkService $findAndDisableLinkService)
    {
        $this->service = $findAndDisableLinkService;
    }

    public function findStaticLink(string $token): View
    {
        $link = $this->service->findStaticLink($token);

        return view('image', [
            'link' => $link
        ]);
    }

    public function DisposableLink(string $token): ?View
    {
        $link = $this->service->findDisposableLink($token);
        $this->service->disableDisposableLink($token);

        return view('image', [
            'link' => $link
        ]);
    }
}
