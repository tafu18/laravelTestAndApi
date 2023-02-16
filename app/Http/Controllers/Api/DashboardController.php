<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        $datas = Category::join('products', 'categories.id', '=', 'products.category_id')->get(['categories.name as categoryName', 'products.*']);

        return response()->json([
            'datas' => $datas,
        ], 200);
    }
}
