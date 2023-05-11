<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ShippingInfo;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
 
class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where([
            ['user_id','=',Auth::user()->id]
        ])->get();
        $categories = Category::all();
        return view('pages.orders',compact('orders','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($user_id,$amount){

        $order = Order::create([
            'status' => '0',
            'user_id' => $user_id,
            'total_amount' => $amount
        ]);

        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderItems = OrderItem::where([
            ['order_id','=',$id],
            ['status','=',1]
        ])->get();
        $order = Order::find($id);
        $shippingInfo = ShippingInfo::where('order_id','=',$id)->get()->first();
        $categories = Category::all();
        $total_discount = 0;
        foreach ($orderItems as $orderItem) {
            $total_discount += (($orderItem->discount * $orderItem->price) / 100) * $orderItem->quantity ;
        } 
        $paymentId = Transaction::where(['order_id'=>$order->id , 'status'=>2 , 'user_id'=>Auth::user()->id])->get()->first(); 
        //dd($paymentId);
        return view('pages.invoice',compact('orderItems','order','shippingInfo','categories','total_discount','paymentId'));
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
    public function update($user_id,$amount,$order_id)
    {
        DB::table('orders')->where('id',$order_id)->update([
            'status' => '1',
            'user_id' => $user_id,
            'total_amount' => $amount
        ]);
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

    public function showOrders(){
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

        
        $orders_for_admin = Order::latest()->paginate(5);
        
        return view('admin.orders.index',compact('orderItems_of_sellers','orders_for_admin'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function showOrderDetails($id){
        $orderItems = OrderItem::where('id','=',$id)->paginate(5);
        return view('admin.orders.show',compact('orderItems'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
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
}



