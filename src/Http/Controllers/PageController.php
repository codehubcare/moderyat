<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Codehubcare\Moderyat\Models\Page;
use Illuminate\Support\Str;

use Codehubcare\Moderyat\Http\Requests\PageStoreRequest;
use Codehubcare\Moderyat\Http\Requests\PageUpdateRequest;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::main()->latest()->get();

        return view('moderyat::pages.index', compact('pages'));
    }

    public function create()
    {
        $page = new Page();

        return view('moderyat::pages.create', compact('page'));
    }

    public function store(PageStoreRequest $request)
    {
        Page::create(
            $request->validated() +
                [
                    'slug' => Str::slug($request['title']),
                    'user_id' => auth()->user()->id
                ]
        );

        return redirect()->route('pages.index')->withSuccess('New page created.');
    }

    public function show(Page $page)
    {
        return view('moderyat::pages.show', compact('page'));
    }

    public function edit(Page $page)
    {
        return view('moderyat::pages.edit', compact('page'));
    }

    public function update(PageUpdateRequest $request, Page $page)
    {

        $page->update(
            $request->validated() +
                [
                    'slug' => Str::slug($request['title'])
                ]
        );

        return redirect()->route('pages.index')->withSuccess('Page updated.');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->withSuccess('Page deleted.');
    }
}
