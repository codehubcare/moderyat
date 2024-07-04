<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Codehubcare\Moderyat\Models\Setting;
use Codehubcare\Moderyat\Http\Requests\SettingsStoreRequest;
use App\Http\Controllers\Controller;
use Codehubcare\Moderyat\Http\Requests\SettingUpdateRequest;

class SettingsController extends Controller
{

    public function index()
    {
        $settings = Setting::all();

        return view('moderyat::settings.index', compact('settings'));
    }

    public function create()
    {
        $setting = new Setting();

        return view('moderyat::settings.create', compact('setting'));
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

    public function edit(Setting $setting)
    {
        return view('moderyat::settings.edit', compact('setting'));
    }

    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $setting->update(
            [
                'key' => Str::snake($request->key),
                'value' => $request->value,
                'type' => $request->type,
            ]
        );

        return redirect()
            ->route('settings.index')
            ->with('success', 'Setting key has been updated.');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();

        return redirect()
            ->route('settings.index')
            ->with('success', 'Setting key has been deleted.');
    }
}
