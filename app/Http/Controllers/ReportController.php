<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReportController extends Controller
{
    private ReportService $service;

    public function __construct(ReportService $reportService)
    {
        $this->service = $reportService;
    }

    public function index(): View
    {
        return view('report', [
            'countOfView' => $this->service->countOfView(),
            'countOfFiles' => $this->service->countOfFiles(),
            'countOfDeletedFiles' => $this->service->countOfDeletedFiles(),
            'countOfDisposableLink' => $this->service->countOfDisposableLink(),
            'countOfDeletedDisposableLink' => $this->service->countOfDeletedDisposableLink(),
        ]);

    }
}
