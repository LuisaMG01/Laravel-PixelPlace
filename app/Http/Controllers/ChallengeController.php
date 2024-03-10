<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use App\Models\Challenge;
use \Illuminate\Http\RedirectResponse;

class ChallengeController extends Controller
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
        return view('challenge.create');
    }

    public function store(Request $request): redirect
    {

        $viewData = new Challenge($request->only([
            'name',
            'description',
            'reward_coins',
            'max_users',
            'product_name',
            'product_quantity'
        ]));

        $viewData -> current_users = 0;
        $viewData -> checked = false;

        Challenge::create($viewData);

        return redirect()->route('challenge.index')->with('success', 'Challenge created successfully!');
    }

    public function delete(Challenge $challenge): redirect
    {
        $viewData = Challenge::findOrFail($id);
        $viewData -> delete();

        return redirect()->route('challenge.index')->with('success', 'Challenge deleted successfully!');
    }

}
