<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

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
}
