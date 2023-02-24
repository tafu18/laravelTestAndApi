<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(): JsonResponse
    {
        $filter = request('filter');
        $search = request('search');

        $products = Product::query();

        $products->when($filter, function ($products) use ($filter) {
            $products->where('category_id', $filter);
        });

        $products->when($search, function ($products) use ($search) {
            $products->where('name', 'LIKE', "%$search%")
                ->orWhere('description', 'LIKE', "%$search%");
        });

        $products->when($filter && $search, function ($products) use ($filter, $search) {
            $products->where('category_id', $filter)->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%$search%")
                    ->orWhere('description', 'LIKE', "%$search%");
            });
        });

        $products = $products->get();

        return response()->json([
            'data' => ProductResource::collection($products),
        ]);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());

        return response()->json([
            'data' => new ProductResource($product),
        ], 201);
    }

    public function show(Product $product): JsonResponse
    {
        //show category with product

        return response()->json([
            'data' => $product->load('category'),
        ]);
    }

    public function update(UpdateProductRequest $request, Product $product): JsonResponse
    {
        $product->update($request->validated());

        return response()->json([
            'data' => $product,
        ]);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json([], 204);
    }
}
