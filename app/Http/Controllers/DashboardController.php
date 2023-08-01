<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Native\Laravel\Dialog;

class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('project.index');
    }

    public function getPath(Request $request)
    {
        return Dialog::new()->folders()->open();
    }
}
