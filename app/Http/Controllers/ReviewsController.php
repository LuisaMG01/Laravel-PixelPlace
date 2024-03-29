<?php

namespace App\Http\Controllers;

use App\Http\Requests\review\CreateRequest;
use App\Http\Requests\review\UpdateRequest;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ReviewsController extends Controller
{
    public function create(int $productId): View
    {

        $viewData = [
            'productId' => $productId,
        ];

        return view('review.create')->with('viewData', $viewData);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $userId = Auth::id();
        $request->merge(['user_id' => $userId]);
        Review::create($request->only(['description', 'rating', 'product_id', 'user_id']));
        Session::flash('message', __('app.success_creation_review'));

        return redirect()->route('products.index');
    }

    public function show(int $productId): view
    {
        $product = Product::findOrFail($productId);
        $reviews = $product->review()->with('user')->paginate(3);
        $viewData = [
            'reviews' => $reviews,
        ];

        return view('review.show')->with('viewData', $viewData);
    }

    public function destroy(int $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('products.index');
    }

    public function edit(int $id): View
    {
        $review = Review::findOrFail($id);
        $viewData = [
            'review' => $review,
        ];

        return view('review.edit')->with('viewData', $viewData);
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        $review->update($request->all());
        Session::flash('message', __('app.success_update_review'));

        return redirect()->route('products.index');
    }
}
