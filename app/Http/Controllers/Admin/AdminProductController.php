<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminProductController extends Controller
{
    public function index(): View
    {
        return view('admin.adminProduct');
    }
}
