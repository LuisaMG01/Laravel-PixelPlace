<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $products = Product::getTopSellingProducts(5);
        $viewData = [
            'products' => $products,
        ];

        return view('home')->with('viewData', $viewData);
    }
}
