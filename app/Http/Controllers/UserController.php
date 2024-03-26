<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class UserController extends Controller
{
    public function settings(): View
    {
        return view('user.settings');
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email']));

        Session::flash('message', 'Updated User Data');

        return redirect()->route('user.settings');
    }
}
