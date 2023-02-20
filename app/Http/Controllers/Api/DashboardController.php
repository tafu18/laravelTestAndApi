<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        // return array countain this (use sql queries): 
        // return all total categories
        // return all total products
        // reteun how many product in every category
        // reteun total products create in last 2 days

        $categories = Category::all();
        $products = Product::all();
        $groupByCategory = DB::table('categories')->join('products', 'categories.id', '=', 'products.category_id')
        ->select('categories.name', DB::raw('count(*) as counter'))->groupBy('categories.name')->get();
        
        $last2DaysProducts = Product::where( 'created_at', '>', Carbon::now()->subDays(2))->get();
        return response()->json([
            'categories' => $categories,
            'products' => $products,
            'groupByCategory' => $groupByCategory, 
            'last2DaysProducts' => $last2DaysProducts,
        ], 200);
    }
}
