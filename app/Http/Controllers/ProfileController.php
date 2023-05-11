<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Models\User_Address;
use Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('pages.profile',compact('categories'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'first_name'=>'required',
            'last_name'=>'required',

        ]);
        $input = $request->all();
        $user = User::find($id);
        $user->update($input);
        return redirect()->route('updateProfile.index')
        ->with('success','اطلاعات حساب کاربری شما با موفقیت ویرایش شد .');
    }

    public function show(User $user)
    {
        $categories = Category::all();
        return view('pages.profile',compact('user','categories'));
    } 

    public function store(Request $request){

        
    }

    public function showProfile(){
        $categories = Category::all();
        return view('pages.profile' , compact('categories'));
    }

    public function showPageChange(){
        return view('auth.change');
    }

    public function changePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|same:confirm-password',
        ]);

        $input = $request->all();
        $user = User::find(Auth::user()->id);

        if (Hash::check($request->input('old_password'), $user->password)) {
            if(!empty($input['password'])){ 

                $input['password'] = Hash::make($input['password']);
    
            }else{
    
                $input = Arr::except($input,array('password'));    
    
            }
        } else {
            return redirect()->route('change')->with('failed','رمز عبور شما نادرست می باشد .');
        }
        
        $user->update($input);


        return redirect()->route('updateProfile.index')
        ->with('success','رمز عبور شما با موفقیت تغییر کرد .');
    }


    public function viewDashboard(){
        $success_orders_for_admin = Order::where('status','=',1)->count();
        $failed_orders_for_admin = Order::where('status','=',0)->count();
        $users_for_admin = User::count();
        $comments_for_admin = Comment::count();

        $orderItems_of_sellers = $this->getArray();
        $comments_for_sellers = $this->getComment();

        $success_orders_for_sellers = $this->getSuccess($orderItems_of_sellers);
        $failed_orders_for_sellers = $this->getFailed($orderItems_of_sellers);

        $amount_of_sells_for_admin = $this->amount_of_sells_for_admin();
        $amount_of_sells_for_sellers = $this->amount_of_sells_for_sellers();


        return view('admin.main-page',compact('success_orders_for_admin','failed_orders_for_admin','users_for_admin','comments_for_admin','success_orders_for_sellers','failed_orders_for_sellers','comments_for_sellers','amount_of_sells_for_admin','amount_of_sells_for_sellers'));
    }


    public function getArray(){
        $orderItems = OrderItem::all();
        $orderItems_of_sellers = array();
        $i = 0 ;
        foreach ($orderItems as $orderItem) {
            if ($orderItem->product->brand_id == Auth::user()->brand_id) {
               $quantity = $this->getQuantity($orderItems_of_sellers , $orderItem->order_id);
               if ($quantity == 0) {
                    $orderItems_of_sellers[$i] = $orderItem;
                    $i++;
               }
            }
        }

        return $orderItems_of_sellers;
    }

    public function getQuantity($orderItems , $brand_id){
        $sum = 0;
        foreach ($orderItems as $orderItem) {
            if ($orderItem->brand_id == $brand_id) {
                $sum++;
            }
        }

        return $sum;
    }

    public function getSuccess($items){

        $sum = 0 ;
        foreach ($items as $item) {
            if ($item->status == 1) {
                $sum++;
            }
        }
        return $sum;
    }


    public function getFailed($items){

        $sum = 0 ;
        foreach ($items as $item) {
            if ($item->status == 0) {
                $sum++;
            }
        }
        return $sum;
    }

    public function getComment(){
        $sum = 0;
        $comments = Comment::all();
        foreach ($comments as $comment) {
            if ($comment->product->brand_id == Auth::user()->brand_id) {
                $sum++;
            }
        }

        return $sum;
    }

    public function amount_of_sells_for_admin(){
        $orders = Order::where('status','=',1)->get()->all();
        $amount_of_sells = 0 ;
        foreach ($orders as $order) {
            $amount_of_sells += $order->total_amount;
        }

        return $amount_of_sells;
    }

    public function amount_of_sells_for_sellers(){
        $orderItems = OrderItem::all();
        $amount_of_sells = 0 ;
        foreach ($orderItems as $orderItem) {
            if ($orderItem->product->brand_id == Auth::user()->brand_id) {
                $amount_of_sells += $orderItem->subtotal;
            }
           
        }

        return $amount_of_sells;
    }
}
