<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class SearchController extends Controller
{
    public function searching(Request $request){
        // Check for search input
        if (request('search')) {
            $products = Product::where('name', 'like', '%' . request('search') . '%')->paginate(8);
        } else {
            $products = Product::paginate(8);
        }

        $categories = Category::all();

        return view('pages.shop-grid',compact('products','categories'));
    }
}
