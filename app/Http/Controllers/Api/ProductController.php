<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(): string
    {
        $product = Product::all();

        return response()->json([
            'product' => $product,
        ]);
    }

    public function store(StoreProductRequest $request): string
    {
        $product = Product::create($request->all());

        return response()->json([
            'product' => $product,
        ], 201);
    }

    public function show(Product $product): string
    {
        return response()->json([
            'product' => $product,
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): string
    {
        $product->update($request->all());

        return response()->json([
            'product' => $product,
        ]);
    }

    public function destroy(Product $product): string
    {
        $product->delete();

        return response()->json([], 204);
    }
}
