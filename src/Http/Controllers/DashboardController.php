<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index()
    {
        return View('dashboard');
    }
}
