<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $message = $product ? 'Product Table is NOT Empty' : 'Product Table is Empty';

        return response()->json([
            'message' => $message,
            'product' => $product,
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $product = Product::create($request->all());
        $message = $product ? 'Store is Successfully' : 'Store is NOT Successfully';

        return response()->json([
            'message' => $message,
            'product' => $product,
        ], 201);
    }

    public function show(Product $product)
    {
        return response()->json([
            'message' => 'product !',
            'product' => $product,
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $product = Product::findOrFail($request->id);
        $product->update($request->all());
        $message = $product ? 'Update is Successfully' : 'Update is NOT Successfully';

        return response()->json([
            'message' => $message,
            'product' => $product,
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([], 204);
    }
}
