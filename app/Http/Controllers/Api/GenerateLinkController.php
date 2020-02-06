<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GenerateLinkService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GenerateLinkController extends Controller
{
    private GenerateLinkService $service;

    public function __construct(GenerateLinkService $generateService)
    {
        $this->service = $generateService;
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
}
