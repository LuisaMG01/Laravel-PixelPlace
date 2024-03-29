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

        $progressData = [];
        foreach ($inProgressChallenges as $challenge) {
            $progress = ChallengeUser::where('user_id', $userId)
                ->where('challenge_id', $challenge->id)
                ->value('progress');

            $progressData[$challenge->id] = $progress;
        }

        $viewData = [
            'undoneChallenges' => $undoneChallenges,
            'doneChallenges' => $doneChallenges,
            'inProgressChallenges' => $inProgressChallenges,
            'progressData' => $progressData,
            'categories' => $categories,
        ];
        
        return view('challenge.authIndex')->with('viewData', $viewData);
    }

    public function index(): View
    {
        $challenges = Challenge::all();
        $categories = Category::all();

        $viewData = [
            'challenges' => $challenges,
            'categories' => $categories,
        ];

        return view('challenge.noAuthIndex')->with('viewData', $viewData);
    }
}