<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


use Codehubcare\Moderyat\Http\Requests\PasswordUpdateRequest;


class PasswordController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        return view('moderyat::change_password.index', compact('user'));
    }

    public function update(PasswordUpdateRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'password' => Hash::make($request->get("new_password"))
        ]);

        return redirect()->route('change-password.index')->withSuccess('Password changed.');
    }
}
