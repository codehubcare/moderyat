<?php

namespace Codehubcare\Moderyat\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Codehubcare\Moderyat\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::simplePaginate();

        return view('moderyat::users.index', compact('users'));
    }

    public function create() {}

    public function store(Request $request)
    {
        return redirect()->route('users.index')->withSuccess('New user added.');
    }

    public function show(User $user)
    {
        return view('moderyat::users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('moderyat::users.edit', compact('user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('users.index')->withSuccess('User updated.');
    }

    public function destroy(User $user)
    {
        // Do not allow user with id = 1 to be deleted
        if ($user->id === 1) {
            return back()->withError('You can not delete this user.');
        }

        $user->delete();

        return redirect()->route('users.index')->withSuccess('User deleted.');
    }
}
