<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\challenge\CreateRequest;
use App\Http\Requests\challenge\UpdateRequest;
use App\Models\Category;
use App\Models\Challenge;
use App\Models\ChallengeUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class ChallengesController extends Controller
{
    public function index(): View
    {
        $challenges = Challenge::paginate(5);
        $categories = Category::all();

        $viewData = [
            'challenges' => $challenges,
            'categories' => $categories,
        ];

        return view('admin.challenge')->with('viewData', $viewData);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $challenge = Challenge::create($request->all());
        ChallengeUser::asignToUsers($challenge['id']);
        Session::flash('success', __('admin.added_succesfully_admin_challenge'));

        return redirect()->route('admin.challenges.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $challenge = Challenge::findOrFail($id);
        $challenge->delete();
        Session::flash('success', __('admin.deleted_succesfully_admin_challenge'));

        return redirect()->route('admin.challenges.index');
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $data = $request->only(['name', 'description', 'reward_coins', 'max_users', 'category_id', 'expiration_date', 'category_quantity', 'checked']);

        Challenge::findOrFail($id)->update($data);
        Session::flash('success', __('admin.updated_succesfully_admin_challenge'));

        return redirect()->route('admin.challenges.index');
    }
}
