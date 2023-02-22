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
        //use product collectıon ProductResource::collection
        return response()->json([
            'data' => ProductResource::collection(Product::paginate(1)),
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

    public function filterProduct(Request $request)
    {
        $category_id = $request->query('category_id');


        $filteredProducts = Product::where('category_id', $category_id)->get();;

        return  response()->json(['data' => $filteredProducts], 200);
    }

    public function searchProduct(Request $request){
        $text = $request->query('text');

        $searchedProducts = Product::where('name', '=', "%$text%")->orWhere('description', 'LIKE', "%$text%")->get();

        return response()->json(['data' => $searchedProducts], 200);
    }
}
