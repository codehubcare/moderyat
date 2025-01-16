<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use App\Http\Controllers\Controller;
use Codehubcare\Moderyat\Http\Requests\SettingsStoreRequest;
use Codehubcare\Moderyat\Http\Requests\SettingUpdateRequest;
use Codehubcare\Moderyat\Models\Setting;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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

    /**
     * Save settings to config file
     */
    public function process()
    {
        $settings = Setting::get()->pluck('value', 'key');
        $array = $settings->toArray();
        $configFileData = var_export($array, true);

        $configFilePath = config_path('settings.php');
        File::put($configFilePath, "<?php \n return ".$configFileData.';');

        // TODO: Run publishing config file command (with flag)

        return redirect()
            ->route('settings.index')
            ->with('success', 'Settings have been saved.');
    }
}
