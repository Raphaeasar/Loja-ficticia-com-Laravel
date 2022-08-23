<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products', compact('products'));
    }

    // Mostrar a página de editar formulário
    public function edit(Product $products)
    {

        return view('admin.product_edit', [
            'products' => $products
        ]);
    }

    // Recebe requisição para dar update PUT
    public function update(Product $products, ProductStoreRequest $request)
    {
        $input = $request->validated();

        if (!empty($input['cover']) && $input['cover']->isValid()) {
            Storage::delete($products->cover ?? '');
            $file = $input['cover'];
            $path = $file->store('products');
            $input['cover'] = $path;
        }

        $products->fill($input);
        $products->save();
        return Redirect::route('admin.products');
    }

    // Mostar página de criar
    public function create()
    {
        return view('admin.product_create');
    }

    // Receber a requisição de criar POST
    public function store(ProductStoreRequest $request)
    {
        $input = $request->validated();
        $input['slug'] = Str::slug($input['name']);

        if (!empty($input['cover']) && $input['cover']->isValid()) {
            $file = $input['cover'];
            $path = $file->store('products');
            $input['cover'] = $path;
        }

        Product::create($input);

        return Redirect::route('admin.products');
    }

    public function destroy(Product $products)
    {
        $products->delete();
        Storage::delete($products->cover ?? '');

        return Redirect::route('admin.products');
    }

    public function destroyImage(Product $products)
    {
        Storage::delete($products->cover ?? '');
        $products->cover = null;
        $products->save();

        return Redirect::back();
    }
}
