<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cart()
    {
        return view('cart');
    }

    public function index(){
        $categories = Category::all();
        return view('pages.cart',compact('categories'));
    }

    public function addToCart(Request $request , $id)
    {
        $product = Product::findOrFail($id);
          
        $cart = session()->get('cart', []);
        
        if ($product->discount != null) {
            $discountAmount = (($product->discount * $product->price ) / 100 );
        }

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity + $cart[$id]['quantity'];
            $cart[$id]['price'] = $cart[$id]['quantity'] * $product->price;
            if ($product->discount != null) {
                $cart[$id]['discount'] =  $discountAmount * $cart[$id]['quantity'];
            } else {
                $cart[$id]['discount'] = 0 ;
            }
            
        }else{
            $cart[$id]['quantity'] = $request->quantity;
            $cart[$id]['price'] = $cart[$id]['quantity'] * $product->price;
            $cart[$id]['name'] = $product->name;
            $cart[$id]['image'] = $product->showImagePath()->first()->getFirstMediaUrl('images');
            if ($product->discount != null) {
                $cart[$id]['discount'] =  $discountAmount * $cart[$id]['quantity'];
            } else {
                $cart[$id]['discount'] = 0 ;
            }
        }
       
          
        session()->put('cart', $cart);
        
        return redirect()->back()->with('success', 'محصول با موفقیت به سبد خرید اضافه شد !');
    }

    public function removeCart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'محصول با موفقیت از سبد خرید حذف شد.');
        }
    }

}


