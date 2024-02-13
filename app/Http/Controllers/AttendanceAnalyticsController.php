<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttendanceAnalyticsController extends Controller
{
    public function __invoke()
    {
        return view('attendance.analytics');
    }
}
