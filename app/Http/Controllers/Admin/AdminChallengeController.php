<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Challenge;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\challenge\CreateRequest;
use App\Http\Requests\challenge\UpdateRequest;

class AdminChallengeController extends Controller
{
    public function index(): View
    {
        $challenges = Challenge::all();
        $categories = Category::all();

        $viewData = [
            'challenges' => $challenges,
            'categories' => $categories,
        ];

        return view('admin.adminChallenge')->with('viewData', $viewData);
    }

    public function store(CreateRequest $request): RedirectResponse
    {

        $challengeData = $request->all();

        Challenge::create($challengeData);

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
        $data = $request->only(['name', 'description', 'reward_coins', 'max_users', 'category_id', 'expiration_date', 'category_quantity']);

        Challenge::findOrFail($id)->update($data);

        return redirect()->route('admin.challenges.index');
    }

}
