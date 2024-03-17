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

    // Obtener todos los desafíos que no están en progreso o terminados
    $allUndoneChallenges = Challenge::whereDoesntHave('challengeUser', function ($query) use ($userId) {
            $query->where('user_id', $userId);
        })
        ->where('checked', false)
        ->get();

    // Fusionar los desafíos no iniciados con los desafíos que no están en progreso o terminados
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
