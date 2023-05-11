<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User_Address;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = User_Address::where('user_id','=',Auth::user()->id)->get()->all();
        $categories = Category::all();
        return view('pages.address' , compact('addresses','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.add-address' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'city' => 'required',
            'address'=> 'required',
            'phone_number' => 'required',
            'post_code' => 'required',
            'credit_card' => 'required'
        ]);

        $user = User::where('email',$request->email)->first();
        $address = new User_Address;
        $address->user_id = $user->id;
        $address->city = $request->city;
        $address->address = $request->address;
        $address->phone_number = $request->phone_number;
        $address->post_code = $request->post_code;
        $address->credit_card = $request->credit_card;
        $address->save();
        return redirect()->route('addresses.index')
            ->with('success','آدرس شما با موفقیت ثبت شد .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($address_id)
    {
        $addresses = User_Address::where('id','=',$address_id)->get();
        $categories = Category::all();
        return view('pages.address-details' , compact('addresses','categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User_Address $address)
    {
        request()->validate([
            'email'=>'required',
            'city' => 'required',
            'address'=> 'required',
            'phone_number' => 'required',
            'post_code' => 'required',
            'credit_card' => 'required'
        ]);

        $address->update($request->all());

        return redirect()->route('addresses.index')

                        ->with('success','آدرس شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User_Address $address)
    {
        $address->delete();

        return redirect()->route('addresses.index')
                        ->with('success','آدرس با موفقیت حذف شد');
    }
}
