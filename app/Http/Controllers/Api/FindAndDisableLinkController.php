<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FindAndDisableLinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FindAndDisableLinkController extends Controller
{
    private FindAndDisableLinkService $service;

    public function __construct(FindAndDisableLinkService $findLinkService)
    {
        $this->service = $findLinkService;
    }

    public function findStaticLink(string $token): JsonResponse
    {
        $link = $this->service->findStaticLink($token);

        return response()->json([
            'status' => 'success',
            'link' => $link
        ]);
    }

    public function DisposableLink(string $token): JsonResponse
    {
        $link = $this->service->findDisposableLink($token);

        return response()->json([
            'status' => 'success',
            'link' => $link
        ]);
    }
}
