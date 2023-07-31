<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('project.index');
    }
}
