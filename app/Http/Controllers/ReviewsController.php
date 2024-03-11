<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use App\Http\Requests\Review\CreateRequest;
use App\Http\Requests\Review\UpdateRequest;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

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
        $review = Review::create($request->only(['description', 'rating', 'product_id']));
        Session::flash('message', 'Review with ID '.$review->id.' has been succesfully created.');

        return redirect()->route('product.index');
    }

    public function show(int $productId): view
    {
        $product = Product::findOrFail($productId);
        $reviews = $product->review;
        $viewData = [
            'reviews' => $reviews,
        ];

        return view('review.show')->with('viewData', $viewData);
    }

    public function destroy(int $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('product.index');
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

        return redirect()->route('product.index');
    }
}
