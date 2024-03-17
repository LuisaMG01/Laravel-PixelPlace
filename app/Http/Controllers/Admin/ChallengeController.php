<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Challenge;
use App\Models\ChallengeUser; 
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ChallengeController extends Controller
{
    public function indexUser(string $userId): View
    {
        $user = User::findOrFail($userId);
        $challenges = Challenge::all();
        $categories = Category::all();
        
        $viewData['challenges'][] = $challenges; 
        $viewData['categories'] = $categories;
    
        foreach ($challenges as $challenge) {
            $challengeUser = ChallengeUser::where('user_id', $user->getId())
                                           ->where('challenge_id', $challenge->getId())
                                           ->first();

            if (!$challengeUser || !$challengeUser->getChecked()) {
                $viewData['challenges'][] = [
                    'challenges' => $challenge,
                ];
            }
        }

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

    public function filter(Request $request): View
    {
        $selectedCategories = $request->input('categories', []);

        if (empty($selectedCategories)) {
            $challenges = Challenge::all();
        } else {
            $challenges = Challenge::whereHas('categories', function($query) use ($selectedCategories) {
            $query->whereIn('id', $selectedCategories);
            })->get();
        }

        $categories = Category::all();
        $viewData = [
            'challenges' => $challenges,
            'categories' => $categories,
        ];

        return view('challenge.index')->with('viewData', $viewData);
    }

/*    public function filter(Request $request)
    {
        dd($request->all());
        $selectedCategories = $request->input('categories', []);
        dd($selectedCategories);

        if (empty($selectedCategories)) {
            $challenges = Challenge::all();
        } else {

            $challenges = Challenge::whereHas('categories', function($query) use ($selectedCategories) {
                $query->whereIn('id', $selectedCategories);
            })->get();
        }

        $viewData = [
            'challenges' => $challenges,
            'categories' => Category::all(),
        ];

        return view('challenge.indexUser')->with('viewData', $viewData);
    }*/

}
