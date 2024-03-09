<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequests\CreateCategoryRequest;
use App\Http\Requests\CategoryRequests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index(): View
    {
        $categories = Category::all();
        $viewData = [
            'categories' => $categories
        ];
        return view('categories.index', $viewData);
    }

    public function create(): View
    {
        return view('categories.create');
    }

    public function store(CreateCategoryRequest $request): RedirectResponse
    {
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category): View
    {
        $viewData = [
            'category' => $category
        ];
        return view('categories.show', $viewData);
    }

    public function edit(Category $category): View
    {
        $viewData = [
            'category' => $category
        ];
        return view('categories.edit', $viewData);
    }

    public function update(UpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
