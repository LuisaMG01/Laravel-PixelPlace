<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Challenge;
use App\Models\User;
use App\Models\ChallengeUser;
use Illuminate\View\View;

class ChallengesController extends Controller
{
    public function indexUser(string $userId): View
{
    $user = User::findOrFail($userId);

    $undoneChallenges = ChallengeUser::where('user_id', $userId)
        ->where('checked', false)
        ->where('progress', '=', 0)
        ->get();

    $allUndoneChallenges = Challenge::whereDoesntHave('challengeUser', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->where('checked', false)
        ->get();

    $undoneChallenges = $undoneChallenges->merge($allUndoneChallenges);

    $doneChallenges = ChallengeUser::where('user_id', $userId)
        ->where('checked', true)
        ->get();

    $inProgressChallenges = ChallengeUser::where('user_id', $userId)
        ->where('checked', false)
        ->where('progress', '>', 0)
        ->get();

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
