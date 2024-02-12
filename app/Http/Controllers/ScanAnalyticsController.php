<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScanAnalyticsController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('scan.analytics');
    }
}
