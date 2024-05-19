<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    public function index(): View
    {
        $categories = Category::paginate(5);
        $viewData = [
            'categories' => $categories,
        ];

        return view('admin.category')->with('viewData', $viewData);
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        Category::create([
            'name' => $request->name,
        ]);
        Session::flash('success', __('admin.added_succesfully_admin_category'));

        return redirect()->route('admin.categories.index');
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        Session::flash('success', __('admin.updated_succesfully_admin_category'));

        return redirect()->route('admin.categories.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('success', __('admin.deleted_succesfully_admin_category'));

        return redirect()->route('admin.categories.index');
    }
}
