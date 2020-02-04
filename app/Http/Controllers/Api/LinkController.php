<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\LinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    private $service;

    public function __construct(LinkService $linkService)
    {
        $this->service = $linkService;
    }

    public function generateStaticLink(int $id): JsonResponse
    {
        $fileToken = $this->service->generateStaticLink($id);

        return response()->json([
            'status' => 'success',
            'static_link' => route('api.check.static.link', [$fileToken->token])
        ]);
    }

    public function generateDisposableLink(int $id): JsonResponse
    {
        $fileToken = $this->service->generateDisposableLink($id);

        return response()->json([
            'status' => 'success',
            'disposable_link' => route('api.check.disposable.link', [$fileToken->token])
        ]);
    }

    public function checkStaticLink(string $token): string
    {
        return $this->service->checkStaticLink($token);
    }

    public function checkDisposableLink(string $token): string
    {
        return $this->service->checkDisposableLink($token);
    }
}
