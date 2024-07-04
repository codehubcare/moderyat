<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Codehubcare\Moderyat\Models\Setting;
use Codehubcare\Moderyat\Http\Requests\SettingsStoreRequest;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{

    public function index()
    {
        $settings = Setting::all();

        return view('moderyat::settings.index', compact('settings'));
    }

    public function create()
    {
        return view('moderyat::settings.create');
    }

    public function store(SettingsStoreRequest $request)
    {
        Setting::create(
            [
                'key' => Str::snake($request->key),
                'value' => $request->value,
                'type' => $request->type,
            ]
        );

        return redirect()
            ->route('settings.index')
            ->with('success', 'New setting key has been added.');
    }
}
