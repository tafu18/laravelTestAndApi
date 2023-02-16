<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(): string
    {
        $category = Category::all();

        return response()->json([
            'category' => $category,
        ]);
    }

    public function store(StoreCategoryRequest $request): string
    {
        $category = Category::create($request->all());

        return response()->json([
            'category' => $category,
        ], 201);
    }

    public function show(Category $category): string
    {
        return response()->json([
            'category' => $category,
        ]);
    }

    public function update(UpdateCategoryRequest $request, Category $category): string
    {
        $category->update($request->all());

        return response()->json([
            'category' => $category,
        ]);
    }

    public function destroy(Category $category): string
    {
        $category->delete();

        return response()->json([], 204);
    }

    public function showProducts(Category $category): string
    {
        $products = Category::find($category->id)->products;

        return response()->json([
            'products' => $products,
        ], 200);
    }
}
