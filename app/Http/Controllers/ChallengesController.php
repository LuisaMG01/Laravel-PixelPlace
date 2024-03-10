<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Models\Challenge;
use App\Models\Category;
use \Illuminate\Http\RedirectResponse;

class ChallengesController extends Controller
{

    public function index(): View
    {
        $viewData = Challenge::all();

        return view('challenge.index') -> with('viewData', $viewData);
    }

    public function show(Challenge $challenge):View
    {
        return view('challenge.show') -> with('viewData', $challenge);
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('challenge.create', compact('categories'));
    }

    public function store(Request $request)
    {
        logger()->info('Valor de category_id:', ['category_id' => $request->input('category_id')]);
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'reward_coins' => 'required|numeric',
            'max_users' => 'required|integer',
            'category_id' => 'required',
            'expiration_date' => 'required|date',
            'category_quantity' => 'required|integer',
        ]);

        $challengeData = $request->only([
            'name',
            'description',
            'reward_coins',
            'max_users',
            'category_id', 
            'category_quantity',
            'expiration_date'
        ]);

        $challengeData['current_users'] = 0;
        $challengeData['checked'] = false;

        Challenge::create($challengeData);

        return redirect()->route('challenge.index')->with('success', 'Challenge created successfully!');
    }

    public function destroy(Challenge $challenge): redirect
    {
        $viewData = Challenge::findOrFail($challenge);
        $viewData -> delete();

        return redirect()->route('challenge.index')->with('success', 'Challenge deleted successfully!');
    }

}
