<?php

namespace App\Http\Controllers;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use \Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Request;

class Html2PdfController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('html2pdf.index');
    }

    public function generate(Request $request): int
    {
        return 0;
    }
}
