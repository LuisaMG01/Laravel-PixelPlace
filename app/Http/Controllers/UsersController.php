<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class UsersController extends Controller
{
    public function settings(): View
    {
        $breadCrumb = [__('app.user_breadcrumb'), __('app.settings_breadcrumb')];

        $viewData = [
            'breadCrumb' => $breadCrumb,
        ];

        return view('user.settings')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request, $user->getName());

        Session::flash('message', 'Updated User Data');

        return redirect()->route('user.settings');
    }
}
