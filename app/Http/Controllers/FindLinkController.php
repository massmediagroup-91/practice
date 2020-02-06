<?php

namespace App\Http\Controllers;

use App\Services\FindLinkService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FindLinkController extends Controller
{
    private FindLinkService $service;

    public function __construct(FindLinkService $findLinkService)
    {
        $this->service = $findLinkService;
    }

    public function findStaticLink(string $token): ?View
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
