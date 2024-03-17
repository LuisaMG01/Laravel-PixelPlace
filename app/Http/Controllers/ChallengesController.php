<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Challenge;
use Illuminate\View\View;

class ChallengesController extends Controller
{
    public function indexUser(string $userId): View
    {
        $user = User::findOrFail($userId);

        $challenges = ChallengeUser::where('user_id', $userId)->get();

        $undoneChallenges = $challenges->where('checked', false)->where('progress', '=', 0);
        $doneChallenges = $challenges->where('checked', true);
        $inProgressChallenges = $challenges->where('checked', false)->where('progress', '>', 0);

        $categories = Category::all();

        $viewData = [
            'undoneChallenges' => $undoneChallenges,
            'doneChallenges' => $doneChallenges,
            'inProgressChallenges' => $inProgressChallenges,
            'categories' => $categories,
        ];

        return view('challenge.indexUser')->with('viewData', $viewData);
    }

    public function index(): View
    {
        $challenges = Challenge::all();
        $categories = Category::all();

        $viewData = [
            'challenges' => $challenges,
            'categories' => $categories,
        ];

        return view('challenge.index')->with('viewData', $viewData);
    }
}
