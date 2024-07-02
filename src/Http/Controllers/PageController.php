<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Codehubcare\Moderyat\Models\Page;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::main()->get();

        return view('moderyat::pages.index', compact('pages'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function edit(Page $page)
    {
        dd('no view file found');
    }
}
