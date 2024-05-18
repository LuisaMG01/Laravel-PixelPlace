<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class HomeController extends Controller
{
    public function index(): View
    {
        $breadCrumb = [];
        $products = Product::getTopSellingProducts(5);
        $viewData = [
            'breadCrumb' => $breadCrumb,
            'products' => $products,
        ];

        return view('home')->with('viewData', $viewData);
    }

    public function locale(string $locale): RedirectResponse
    {
        session(['locale' => $locale]);

        return redirect()->back()->withCookie('locale', $locale);
    }
}
