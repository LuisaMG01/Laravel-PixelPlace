<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\product\CreateRequest;
use App\Http\Requests\product\UpdateRequest;
use App\Interfaces\ImageStorage;
use App\Models\Category;
use App\Models\Product;
use App\Utils\JsonParser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProductsController extends Controller
{
    public function index(): View
    {
        $products = Product::with('category')->paginate(5);
        $categories = Category::all();

        $viewData = [
            'products' => $products,
            'categories' => $categories,
        ];

        return view('admin.product')->with('viewData', $viewData);
    }

    public function destroy(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('success', __('admin.deleted_succesfully_admin_product'));

        return redirect()->route('admin.products.index');
    }

    public function update(UpdateRequest $request, int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        $keys = JsonParser::parseStrToJson($request->input('keywords'));
        $request->merge(['keywords' => $keys]);
        $product->update($request->all());
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request, $product->getName());

        Session::flash('success', __('admin.updated_succesfully_admin_product'));

        return redirect()->route('admin.products.index');
    }

    public function store(CreateRequest $request): RedirectResponse
    {
        $keys = JsonParser::parseStrToJson($request->input('keywords'));
        $request->merge(['keywords' => $keys]);
        $productName = $request->input('name');
        $storeInterface = app(ImageStorage::class, ['storage' => $request->get('storage')]);
        $storeInterface->store($request, $productName);
        Product::create($request->all());
        Session::flash('success', __('admin.added_succesfully_admin_product'));

        return redirect()->route('admin.products.index');
    }
}
