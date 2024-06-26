<?php

namespace App\Http\Controllers;

use App\Http\Requests\Review\CreateRequest;
use App\Http\Requests\Review\UpdateRequest;
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
        $breadCrumb = [__('app.products_breadcrumb'), __('app.reviews_breadcrumb'), __('app.create_reviews_breadcrumb')];

        $viewData = [
            'breadCrumb' => $breadCrumb,
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
        $reviews = $product->reviews()->with('user')->paginate(3);

        $breadCrumb = [__('app.products_breadcrumb'), __('app.reviews_breadcrumb'), __('app.show_reviews_breadcrumb')];

        $viewData = [
            'breadCrumb' => $breadCrumb,
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

        $breadCrumb = [__('app.products_breadcrumb'), __('app.reviews_breadcrumb'), __('app.edit_reviews_breadcrumb')];

        $viewData = [
            'breadCrumb' => $breadCrumb,
            'review' => $review,
        ];

        return view('review.edit')->with('viewData', $viewData);
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        $review->update($request->all());
        Session::flash('updated', __('app.success_update_review'));

        return redirect()->route('products.index');
    }
}
