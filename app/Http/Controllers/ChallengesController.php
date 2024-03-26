<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Challenge;
use App\Models\ChallengeUser;
use App\Models\User;
use Illuminate\View\View;

class ChallengesController extends Controller
{
    public function indexUser(string $userId): View
    {
        $user = User::findOrFail($userId);

        $undoneChallengeIds = ChallengeUser::where('user_id', $userId)
            ->where('checked', false)
            ->where('progress', '=', 0)
            ->pluck('challenge_id');

        $doneChallengeIds = ChallengeUser::where('user_id', $userId)
            ->where('checked', true)
            ->pluck('challenge_id');

        $inProgressChallengeIds = ChallengeUser::where('user_id', $userId)
            ->where('checked', false)
            ->where('progress', '>', 0)
            ->pluck('challenge_id');

        $categories = Category::all();

        $undoneChallenges = Challenge::whereIn('id', $undoneChallengeIds)->where('checked', 0)->get();
        $doneChallenges = Challenge::whereIn('id', $doneChallengeIds)->get();
        $inProgressChallenges = Challenge::whereIn('id', $inProgressChallengeIds)->where('checked', 0)->get();

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
