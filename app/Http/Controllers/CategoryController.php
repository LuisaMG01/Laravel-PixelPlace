<?php

namespace App\Http\Controllers;

use App\Http\Requests\category\CreateRequest;
use App\Http\Requests\category\UpdateRequest;
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
        return view('category.index', $viewData);
    }

    public function create(): View
    {
        return view('category.create');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        Category::create([
            'name' => $request->name,
        ]);
        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function show(Category $category): View
    {
        $viewData = [
            'category' => $category
        ];
        return view('category.show', $viewData);
    }

    public function edit(Category $category): View
    {
        $viewData = [
            'category' => $category
        ];
        return view('category.edit', $viewData);
    }

    public function update(UpdateRequest $request, Category $category): RedirectResponse
    {
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
    }
}
