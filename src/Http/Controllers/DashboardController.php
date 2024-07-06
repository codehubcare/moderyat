<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        return view('moderyat::dashboard', compact('user'));
    }
}
