<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
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

    public function orderIndex(Request $request): View|RedirectResponse
    {
        if (Auth::check()) {
            $userId = Auth::user()->getId();
            $orders = Order::filters($request)->where('user_id', $userId)->paginate(10);
            $orders->appends($request->all());

            $viewData = [
                'orders' => $orders,
            ];

            return view('user.orders')->with('viewData', $viewData);
        } else {
            return redirect()->route('home')->with('error', 'You must login first');
        }
    }

    public function orderShow(int $id): View
    {
        $order = Order::with('items')->findOrFail($id);

        $viewData = [
            'order' => $order,
        ];

        return view('user.order')->with('viewData', $viewData);
    }
}