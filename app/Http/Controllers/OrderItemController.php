<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store($userId,$orderId,$productId,$productPrice,$Quantity,$subtotal,$discount)
    {
        //dd($discount);
        $order = OrderItem::create([
            'user_id' => $userId,
            'order_id'=>$orderId,
            'product_id' =>$productId , 
            'price' => $productPrice, 
            'quantity' =>$Quantity , 
            'subtotal' => $subtotal ,
            'status' => '0',
            'discount'=> $discount,
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
    public function update($userId,$orderId,$productId,$productPrice,$Quantity,$subtotal,$discount)
    {
        DB::table('order_items')->where(['order_id'=> $orderId , 'product_id'=>$productId])->update([
            'user_id' => $userId,
            'order_id'=>$orderId,
            'product_id' =>$productId , 
            'price' => $productPrice, 
            'quantity' =>$Quantity , 
            'subtotal' => $subtotal ,
            'status' => '1',
            'discount'=> $discount,
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
}
