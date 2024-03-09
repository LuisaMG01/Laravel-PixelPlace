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

    public function show(Challende $challenge):View
    {

        return view('challenge.show') -> with('viewData', $challenge);
    }

    public function create(): View
    {
        return view('challenge.create');
    }

    public function store(Request $request): 
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

        return back();
    }

    public function delete( $id): redirect
    {
        $viewData = Challenge::findOrFail($id);
        $viewData -> delete();

        return redirect()->route('challenge.index')->with('success', 'Challenge deleted successfully!');
    }

}
