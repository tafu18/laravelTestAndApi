<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProducts()
    {
        $data = Product::all();

        return response()->json($data);
    }

    public function index()
    {
        $products = Product::all();

        return View('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(CreateProductRequest $request)
    {
        Product::create($request->all());

        return to_route('product.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index');
    }

    public function denemeFonk()
    {
        return null;
    }
}
