<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Builder;

class ShowController extends Controller
{
    //
    public function ShowHome(){
       $orderItems = Product::orderBy('buyCount','DESC')->take(5)->get();
        $newproducts = Product::orderBy('created_at','DESC')->take(8)->get();
        $categories = Category::all();
        $discountproducts = Product::whereNotNull('discount')->take(5)->get();
 
        return view('home', compact('newproducts','categories','discountproducts','orderItems'));
    }

    public function mostSaledProduct(){

    }
}
