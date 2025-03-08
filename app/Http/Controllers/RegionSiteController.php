<?php

namespace App\Http\Controllers;

use App\Models\Site;
use Illuminate\Http\Request;

class RegionSiteController extends Controller
{
    public function show($region)
    {
        $sites =  Site::query()->where('region_id', $region)->get();
        return sendSuccess(['sites' => $sites], 'Sites retrieved');
    }
}
