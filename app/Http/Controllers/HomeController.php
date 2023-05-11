<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orderItems = Product::orderBy('buyCount','DESC')->take(5)->get();
        $newproducts = Product::orderBy('created_at','DESC')->take(5)->get();
        $categories = Category::all();
        $discountproducts = Product::whereNotNull('discount')->take(5)->get();

        return view('home', compact('newproducts','categories','discountproducts','orderItems'));
    }
}
