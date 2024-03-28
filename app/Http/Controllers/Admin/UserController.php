<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\CreateRequest;
use App\Http\Requests\user\UpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

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

        Session::flash('success', __('admin.deleted_succesfully_admin_user'));

        return redirect()->route('admin.users.index');
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        Session::flash('success', __('admin.updated_succesfully_admin_user'));

        return redirect()->route('admin.users.index');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        User::create($request->all());

        Session::flash('success', __('admin.added_succesfully_admin_user'));

        return redirect()->route('admin.users.index');
    }
}
