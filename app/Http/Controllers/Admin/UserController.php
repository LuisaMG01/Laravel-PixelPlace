<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\user\CreateRequest;
use App\Http\Requests\user\UpdateRequest;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::paginate(5);

        $viewData = [
            'users' => $users,
        ];

        return view('admin.user', $viewData);
    }

    public function destroy(int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        Session::flash('success', 'User deleted successfully.');

        return redirect()->route('admin.users.index');
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        Session::flash('success', 'User updated successfully.');

        return redirect()->route('admin.users.index');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        User::create($request->all());

        Session::flash('success', 'User updated successfully.');

        return redirect()->route('admin.users.index');
    }
}
