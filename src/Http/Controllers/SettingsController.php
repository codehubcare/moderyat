<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function index()
    {
        return view('moderyat::settings.index');
    }
}
