<?php

namespace App\Http\Controllers;

use App\Http\Requests\challenge\CreateRequest;
use App\Models\Category;
use App\Models\Challenge;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChallengesController extends Controller
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

    public function show(int $id): View
    {
        $challenge = Challenge::findOrFail($id);
        $viewData = [
            'challenge' => $challenge,
        ];

        return view('admin.adminChallenge')->with('viewData', $viewData);
    }
}
