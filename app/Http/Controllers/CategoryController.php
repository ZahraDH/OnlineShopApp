<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class CategoryController extends Controller
{
    //
    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()

    {

         $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);

         $this->middleware('permission:category-create', ['only' => ['create','store']]);

         $this->middleware('permission:category-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:category-delete', ['only' => ['destroy']]);

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $categories = Category::latest()->paginate(5);

        return view('admin.categories.index',compact('categories'))

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
        return view('admin.categories.create',compact("categories"));

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

            'parent_id' => 'nullable',

            'category_name' => 'required',

        ]);

    

        Category::create($request->all());

    

        return redirect()->route('categories.index')

                        ->with('success','دسته بندی با موفقیت ایجاد شد');

    }

    

    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Category $category)

    {

        return view('admin.categories.show',compact('category'));

    }

    

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(Category $category)

    {

        $categories = Category::all();
        return view('admin.categories.edit',compact('category','categories'));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Category  $Category

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, Category $category)

    {

         request()->validate([

            'parent_id' => 'nullable',

            'category_name' => 'required',

        ]);

    

        $category->update($request->all());

    

        return redirect()->route('categories.index')

                        ->with('success','دسته بندی با موفقیت ویرایش شد .');

    }

    

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy(Category $category)

    {

        $category->delete();

    

        return redirect()->route('categories.index')

                        ->with('success','دسته بندی با موفقیت حذف شد .');

    }

    public function showCategoryPageOne($Id){
        $products = Product::where('category_id','=',$Id)->paginate(8);
        $categories = Category::all();
        return view('pages.shop-category',compact('products','categories'));
    }

    public function showCategoryPageTwo($Id , Request $request){
        $ParentCategories = Category::where('parent_id','=',$Id)->get()->all();
        $categories = Category::all();

        $vintages= array();
        $product = Product::all();
        $j = 0;
        foreach ($product as $pro) {
            foreach ($ParentCategories as $ParentCategory) {
                if ($pro->category_id == $ParentCategory->id) {
                    
                    $vintages[$j] = $pro;
                    $j++;
                }
            }
        }

        $currentPage = Paginator::resolveCurrentPage();
        $col = collect($vintages);
        $perPage = 8;
        $currentPageItems = $col->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $products = new Paginator($currentPageItems, count($col), $perPage);
        $products->setPath($request->url());
        $products->appends($request->all());

        return view('pages.shop-category',compact('products','categories'));
        
        
    }

    public function showTagNew(){
        $categories = Category::all();
        $products = Product::orderBy('created_at','DESC')->paginate(8);
        return view('pages.shop-category', compact('products','categories'));
    }

    public function showTagMostPopular(){
        $categories = Category::all();
        $products = Product::orderBy('buyCount','DESC')->paginate(8);
        return view('pages.shop-category', compact('products','categories'));
    }

    public function showTagDiscount(){
        $categories = Category::all();
        $products = Product::whereNotNull('discount')->paginate(8);
        return view('pages.shop-category', compact('products','categories'));
    }
}
