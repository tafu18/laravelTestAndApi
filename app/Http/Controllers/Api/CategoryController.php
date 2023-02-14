<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $message = $category ? 'Category Table is NOT Empty' : 'Category Table is Empty';

        return response()->json([
            'message' => $message,
            'category' => $category,
        ]);
    }

    public function store(Request $request)
    {
        $category = Category::create($request->all());
        $message = $category ? 'Store is Successfully' : 'Store is NOT Successfully';

        return response()->json([
            'message' => $message,
            'category' => $category,
        ], 201);
    }

    public function show(Category $category)
    {
        return response()->json([
            'message' => 'category !',
            'category' => $category,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $category = Category::findOrFail($request->id);
        $category->update($request->all());
        $message = $category ? 'Update is Successfully' : 'Update is NOT Successfully';

        return response()->json([
            'message' => $message,
            'category' => $category,
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([], 204);
    }

    public function showProducts(Category $category)
    {
        $products = Category::find($category->id)->getProducts;

        return response()->json([
            'products' => $products,
        ], 200);
    }

    public function showProductsName(Category $category)
    {
        $products = Category::find($category->id)->getProducts;

        foreach ($products as $product) {
            $productsName[] = $product->name;
            $productsType[] = $product->type;
        }

        return response()->json([
            'productsName' => $productsName,
            'productsType' => $productsType,
        ], 200);
    }
}
