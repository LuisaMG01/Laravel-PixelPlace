<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Category;
use App\Http\Requests\category\CreateRequest;
use App\Http\Requests\category\UpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class AdminCategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::paginate(5);
        $viewData = [
            'categories' => $categories,
        ];
        return view('admin.adminCategory', $viewData);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        Category::create([
            'name' => $request->name,
        ]);
        Session::flash('success', 'Category created successfully.');

        return redirect()->route('admin.categories.index');
    }

    public function update(UpdateRequest $request,  $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);
        Session::flash('success', 'Category updated successfully.');

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('success', 'Category deleted successfully.');

        return redirect()->route('admin.categories.index');
    }
}
