<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::latest()->paginate(5);
        return view('admin.brands.index',compact('brands'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.register-brand');
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
            'brand_name' => 'required|unique:brands',
            'trade_id' => 'required|unique:brands',
            'national_number' => 'required|unique:brands',
            'city' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'post_code' => 'required',
            'email' => 'required|unique:brands|email'

        ]);

        Brand::create($request->all());
        $brand = Brand::where('brand_name','=',$request->brand_name)->first();
        DB::table('users')->where('id',Auth::user()->id)->update([
            'brand_id' => $brand->id,
        ]);

        return redirect()->route('check-situaition');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit',compact('brand'));
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
            'status' => 'required'
        ]);


        DB::table('brands')->where('id',$id)->update([
            'status' => $request->status,
            'code' => random_int(100000, 999999)
        ]);

        return redirect()->route('brands.index')->with('success','وضعیت فروشنده با موفقیت بررسی شد .');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sellerRegister(){


        $roles = Role::where('name','=','supplier')->get()->first();
        return view('supplier.register',compact('roles'));
    }


    public function CreateSeller(Request $request){
        $this->validate($request, [

            'name' => 'required',

            'first_name' => 'required',

            'last_name' => 'required',

            'email' => 'required|email|unique:users,email',

            'password' => 'required|same:confirm-password',

            'roles' => 'required',

            'status' => 'required'

        ]);

    

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        $user->assignRole($request->input('roles'));

    

        return redirect()->route('brands.create')

                        ->with('success','کاربر با موفقیت ایجاد شد .');
    }

    public function ShowUpdateUserSeller(){
        return view('supplier.show-update-seller');
    }

    public function updateUserSeller(Request $request){
        request()->validate([
            'brand_name' => 'required',
            'email' => 'required|email',
            'code' => 'required'
        ]);

        $brand = Brand::where('brand_name','=',$request->brand_name)->first();
        $user = User::where('email','=',$request->email)->first();

        if ($brand->code == $request->code) {
            DB::table('users')->where('id',$user->id)->update([
                'brand_id' => $brand->id,
                'status' => 2,
            ]);
        }

        return redirect()->route('dashboard');
    }

    public function ShowcheckingPage(){
        $brand = Brand::where('id','=',Auth::user()->brand_id)->first();
        $categories = Category::all();
        return view('supplier.check',compact('brand','categories'));
    }


    
}
