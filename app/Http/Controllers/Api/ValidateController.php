<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FindLinkService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ValidateController extends Controller
{
    private FindLinkService $service;

    public function __construct(FindLinkService $validateService)
    {
        $this->service = $validateService;
    }

    public function validateStaticLink(string $token): ?View
    {
        return $this->service->validateStaticLink($token);
    }

    public function validateDisposableLink(string $token): ?View
    {
        return $this->service->validateDisposableLink($token);
    }
}
