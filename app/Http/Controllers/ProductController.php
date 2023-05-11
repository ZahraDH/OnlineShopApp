<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    //
        /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()

    {

         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);

         $this->middleware('permission:product-create', ['only' => ['create','store']]);

         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:product-delete', ['only' => ['destroy']]);

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index(Request $request)

    {

        $products = Product::latest()->paginate(5);
        $products_of_seller = Product::where('brand_id','=',Auth::user()->brand_id)->latest()->paginate(5);
        
        return view('admin.products.index',compact('products','products_of_seller'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        $categories = Category::all();
        $brand = Brand::where('id','=',Auth::user()->brand_id)->first();
        return view('admin.products.create',compact('categories','brand'));

    }

    

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        request()->validate([

            'category_id' => 'required',
            'user_id' => 'required',
            'brand_id' => 'required',
            'name'=>'required',
            'description'=>'nullable',
            'price'=>'required',
            'sku'=>'required',
            'weight'=>'required',
            'brand'=>'nullable',
            'quantity'=>'required',
            'discount'=>'nullable',

        ]);

        Product::create($request->all());

        return redirect()->route('products.index')

                        ->with('success','محصول با موفقیت اضافه شد .');

    }

    

    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Product $product)

    {

        $users = User::all();
        return view('admin.products.show',compact('product','users'));

    }

    

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(Product $product)

    {

        $categories = Category::all();
        $brand = Brand::where('id','=',$product->brand_id)->first();
        return view('admin.products.edit',compact('product','categories','brand'));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Product $product)

    {

         request()->validate([

            'category_id' => 'required',
            'user_id' => 'required',
            'brand_id' => 'required',
            'name'=>'required',
            'description'=>'nullable',
            'price'=>'required',
            'sku'=>'required',
            'weight'=>'required',
            'brand'=>'nullable',
            'quantity'=>'required',
            'discount'=>'nullable',

        ]);

    

        $product->update($request->all());

    

        return redirect()->route('products.index')

                        ->with('success','محصول با موفقیت ویرایش شد .');

    }

    

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy(Product $product)

    {

        $product->delete();

    

        return redirect()->route('products.index')

                        ->with('success','محصول با موفقیت حذف شد .');

    }


    public function shop_grid(){
        $products = Product::paginate(8);
        $categories = Category::all();
        return view('pages.shop-grid',compact('products','categories'));
    }

    public function showProductDetail($id){

        $product = Product::find($id);
        $category = Category::find($product->category_id);
        $parentOfCategory = null;
        $parentParentOfCategory = null;
        if ($category->parent_id != null) {
            $parentOfCategory = Category::find($category->parent_id);
            if (!isNull($parentOfCategory->parent_id)) {
                $parentParentOfCategory = Category::find($parentOfCategory->parent_id);
            }
        }
        
        $categories = Category::all();
        $comments = $product->comments;
        $images = Image::all();

        return view('pages.product-details',compact('product','category','parentOfCategory','categories','comments','images'));
    }


    public function updateQuantity($productId,$quantityofProduct){
        $product = Product::find($productId);
        $user_id = $product->user_id;
        $category_id = $product->category_id;
        $sku = $product->sku;
        $name = $product->name;
        $description = $product->description;
        $weight = $product->weight;
        $brand = $product->brand;
        $quantity = $product->quantity;
        $price = $product->price;
        $discount = $product->discount; 
        $buyCount = $product->buyCount;
        $buyCount = $buyCount + $quantityofProduct;
        $quantity = $quantity - $quantityofProduct;
        DB::table('products')->where('id',$productId)->update([
            'user_id' => $user_id,
            'category_id' => $category_id,
            'sku' => $sku,
            'name' => $name,
            'description' => $description,
            'weight' => $weight,
            'brand' => $brand,
            'quantity' => $quantity,
            'price' => $price,
            'discount' => $discount ,
            'buyCount' => $buyCount
        ]);
    }
    
}

