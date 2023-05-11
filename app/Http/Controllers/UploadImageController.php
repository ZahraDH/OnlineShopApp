<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Media;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class UploadImageController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Image::latest()->paginate(5);
        return view('admin.images.index',compact('images'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.images.create');
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
            'product_sku'=>'required',
            'image' => 'required'
        ]);

        $product = Product::where('sku','=',$request->product_sku)->first();
        $image = new Image();
        $image->product_id = $product->id;
        $image->save(); 
        
 
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->route('upload-image.index')->with('success','تصویر با موفقیت به محصول اضافه شد .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = Image::where('id','=',$id)->first();
        return view('admin.images.show',compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::where('id','=',$id)->first();
        return view('admin.images.edit',compact('image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'product_sku'=>'required',
            'image' => 'required'
        ]);

        $product = Product::where('sku','=',$request->product_sku)->first();
        DB::table('images')->where('id','=',$id)->update([
            'product_id'=>$product->id
        ]);
        
        $image = Image::where('id','=',$id)->first();
 
        if($request->hasFile('image') && $request->file('image')->isValid()){
            $image->addMediaFromRequest('image')->toMediaCollection('images');
        }
        return redirect()->route('upload-image.index')->with('success','تصویر با موفقیت به محصول اضافه شد .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::where('id','=',$id)->first();
        $image->delete();
        return redirect()->route('upload-image.index')

                        ->with('success','تصویر با موفقیت حذف شد .');
    }
}
