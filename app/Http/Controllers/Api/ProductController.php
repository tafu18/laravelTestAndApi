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
    public function index(Request $request): JsonResponse
    {
        $filter = $request->query('filter');
        $search = $request->query('search');

        $query = Product::all();

        if ($filter != null) {
            $query = $query->where('category_id', $filter);
        }

        if ($search != null) {
            $query = $query->where('name', 'LIKE', "%$search%")
            ->orWhere('description', 'LIKE', "%$search%")->get();
        }

        /* $query->paginate(5); */

        return response()->json([
            'data' => ProductResource::collection($query),
        ]);

        /*         if ($filter != null && $search != null) {
                    $products = Product::where('category_id', $filter)->where(function ($query) use ($search) {
                        $query->where('name', 'LIKE', "%$search%")
                            ->orWhere('description', 'LIKE', "%$search%");
                    })
                        ->get();
                } elseif ($search != null) {
                    $products = Product::where('name', 'LIKE', "%$search%")
                        ->orWhere('description', 'LIKE', "%$search%")
                        ->get();
                } elseif ($filter != null) {
                    $products = Product::where('category_id', $filter)
                        ->get();
                } else $products = Product::paginate(5);

                return response()->json([
                    'data' => ProductResource::collection($products),
                ]); */
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
