<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Category::all()->products;

        return response()->json([
            'products' => $products,
        ], 200);
    }
}
