<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use App\Http\Controllers\Controller;
use Codehubcare\Moderyat\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        return view('moderyat::profile.index', compact('user'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = auth()->user();
        $user->update($request->validated());

        return redirect()->route('profile.index')->withSuccess('Profile updated.');
    }
}
