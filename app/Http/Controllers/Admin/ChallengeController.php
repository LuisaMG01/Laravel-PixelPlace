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

class ChallengeController extends Controller
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

        return redirect()->route('admin.challenges.index')->with('success', 'Challenge created successfully!');
    }

    public function destroy(int $id): RedirectResponse
    {
        $viewData = Challenge::findOrFail($id);
        $viewData->delete();

        return redirect()->route('admin.challenges.index');
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $data = $request->only(['name', 'description', 'reward_coins', 'max_users', 'category_id', 'expiration_date', 'category_quantity', 'checked']);

        Challenge::findOrFail($id)->update($data);

        return redirect()->route('admin.challenges.index');
    }
}
