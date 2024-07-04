<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use Illuminate\Http\Request;
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
        // $user->update($request->validated());

        return redirect()->route('change-password.index')->withSuccess('Password changed.');
    }
}
