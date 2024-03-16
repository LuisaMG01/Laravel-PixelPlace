<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\category\CreateRequest;
use App\Http\Requests\category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::paginate(5);
        $viewData = [
            'categories' => $categories,
        ];

        return view('admin.category', $viewData);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        Category::create([
            'name' => $request->name,
        ]);
        Session::flash('success', 'Category created successfully.');

        return redirect()->route('admin.categories.index');
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        Session::flash('success', 'Category updated successfully.');

        return redirect()->route('admin.categories.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('success', 'Category deleted successfully.');

        return redirect()->route('admin.categories.index');
    }
}
