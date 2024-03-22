<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

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
