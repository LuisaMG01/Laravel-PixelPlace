<?php

namespace App\Http\Controllers;

use Illuminate\View\View;


class ReviewsController extends Controller
{
    public function create(): View
    {
        return view('review.create');
    }
}
