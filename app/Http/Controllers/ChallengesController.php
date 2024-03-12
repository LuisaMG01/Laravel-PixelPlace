<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Models\Challenge;
use App\Models\Category;
use Carbon\Carbon; 
use \Illuminate\Http\RedirectResponse;

class ChallengesController extends Controller
{

    public function index(): View
    {
        $viewData = Challenge::all();

        return view('challenge.index') -> with('viewData', $viewData);
    }

    public function show(int $id): View
    {
        $challenge = Challenge::findOrFail($id);        
        $viewData = [
            'challenge' => $challenge,
        ];

        return view('challenge.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $categories = Category::all();

        return view('challenge.create', compact('categories'));
    }

    public function store(Request $request)
    {
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

    public function destroy(int $id): redirect
    {
        $viewData = Challenge::findOrFail($id);
        $viewData -> delete();

        return redirect()->route('challenge.index');
    }

    public function edit(int $id): View
    {
        $challenge = Challenge::findOrFail($id);
        $viewData = [
            'challenge' => $challenge,
        ];

        return view('challenge.edit')->with('viewData', $viewData);
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'reward_coins' => 'required|numeric',
            'max_users' => 'required|integer',
            'category_id' => 'required',
            'expiration_date' => 'required|date',
            'category_quantity' => 'required|integer',
        ]);

        $challenge = Challenge::findOrFail($id);

        $challenge->name = $request->input('name');
        $challenge->description = $request->input('description');
        $challenge->reward_coins = $request->input('reward_coins');
        $challenge->max_users = $request->input('max_users');
        $challenge->category_id = $request->input('category_id');
        $challenge->expiration_date = Carbon::createFromFormat('Y-m-d', $request->input('expiration_date'));;
        $challenge->category_quantity = $request->input('category_quantity');

        $challenge->save();

        return redirect()->route('challenge.index');
    }

}
