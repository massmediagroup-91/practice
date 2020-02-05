<?php

namespace App\Http\Controllers;

use App\Services\ReportService;
use App\View;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private ReportService $service;

    public function __construct(ReportService $reportService)
    {
        $this->service = $reportService;
    }

    public function index() {
        return view('report', [
            'countOfView' => $this->service->countOfView(),
            'countOfFiles' => $this->service->countOfFiles(),
            'countOfDeletedFiles' => $this->service->countOfDeletedFiles(),
            'countOfDisposableLink' => $this->service->countOfDisposableLink(),
            'countOfDeletedDisposableLink' => $this->service->countOfDeletedDisposableLink(),
        ]);

    }


}
