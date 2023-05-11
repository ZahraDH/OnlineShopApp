<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Models\Transaction;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use PhpParser\Node\Stmt\TryCatch;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Shetabit\Multipay\Exceptions\PurchaseFailedException;
use SoapFault;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\ProductController;
use App\Models\User_Address;
use App\Http\Controllers\ShippingInfoController;

use function PHPSTORM_META\type;
use function PHPUnit\Framework\isNull;
use App\Models\Category;

class paymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function purchase(Request $request,$product_ids,$quantity,$address_id,$totalAmount){

        try{

            $userAddress = User_Address::where('user_id','=',Auth::user()->id)->latest()->first();
            if (is_null($userAddress)) {
                return redirect()->route('addresses.create');
              
            }else{
               
                $invoice = new Invoice;
                $products = Product::all();
                $product_ids = explode(",",$product_ids);
                $quantity = explode(",",$quantity);
    
                
                
                // creating order tables
                $order = (new OrderController)->store(Auth::user()->id,$totalAmount);
                foreach($product_ids as $counter => $id){
                    foreach($products as $product){
                        if($product->id == $id){
                            $Quantity = $this->getQuantity($counter,$quantity);  
                            $productDiscount = (($product->discount * $product->price) / 100 ) * $Quantity ;
                            $productPriceWithoutDiscount = ($product->price)*$Quantity;           
                            $subtotal = $productPriceWithoutDiscount - $productDiscount;
                            (new OrderItemController)->store(Auth::user()->id,$order->id,$product->id,$product->price,$Quantity,$subtotal,$product->discount);
                        }
                    }
                }    
    
               
                $shipp = (new ShippingInfoController)->store($order->id,$address_id);
                $invoice->amount($totalAmount);
            
    
                
                $user = Auth::user();
                $paymentId = md5(uniqId());
                $transaction = $user->transactions()->create([
                    'order_id' => $order->id,
                    'paid' => $invoice->getAmount(),
                    'invoice_details' => $invoice ,
                    'payment_id' => $paymentId  
                ]);
    
    
                $product_ids = implode(",",$product_ids); $quantity = implode(",",$quantity);
                $callbackUrl = route('purchase.result',[$product_ids ,$quantity,$address_id, 'payment_id' => $paymentId]); 
                $payment = Payment::callbackUrl($callbackUrl);
    
                $payment->purchase($invoice, function($driver, $transactionId) use ($transaction){
                    // We can store $transactionId in database.
                    $transaction->transaction_id = $transactionId;
                    $transaction->save();
    
                });
                return $payment->pay()->render();
            }
        } catch (PurchaseFailedException|SoapFault $th) {
            $transaction->transaction_result = [
                'message' => $th->getMessage(),
                'code' => $th->getCode(),
            ];
            $transaction->status = Transaction::STATUS_FAILED;
        
            $transaction->save();
        }
       
    }


    public function getQuantity($counter,$quantity){
        $quantityofproduct = 0 ;
        foreach($quantity as $count => $id){
            if ($counter == $count) {
                $quantityofproduct = $id;
            }
        }
        return $quantityofproduct;
    }

   

    public function result(Request $request, $product_ids , $quantity){
        if ($request->missing('payment_id')) {
            return view('pages.result')->with('status','failed','تراکنش شما ناموفق بود .');
        }

        $transaction = Transaction::where('payment_id',$request->payment_id)->first();
        if (empty($transaction)) {
            return view('pages.result')->with('status','failed','تراکنش شما ناموفق بود .');
        }

        if ($transaction->user_id <> Auth::id()) {
            return view('pages.result')->with('status','failed','تراکنش شما ناموفق بود .');
        }

        if ($transaction->status <> Transaction::STATUS_PENDING) {
            return view('pages.result')->with('status','failed','تراکنش شما ناموفق بود .');
        }

        try {
            $receipt = Payment::amount($transaction->paid)
                        ->transactionId($transaction->transaction_id)->verify();
            $transaction->transaction_result = $receipt;
            $transaction->status = Transaction::STATUS_SUCCESS;
            $transaction->save();

            $product_ids = explode(",",$product_ids);
            $quantity = explode(",",$quantity);

            
            $products = Product::all();
            if ($transaction->status == Transaction::STATUS_SUCCESS) {
                app('App\Http\Controllers\OrderController')->update(Auth::user()->id,$transaction->paid,$transaction->order_id);
                foreach($product_ids as $counter => $id){
                    foreach($products as $product){
                        if($product->id == $id){
                            $Quantity = $this->getQuantity($counter,$quantity);  
                            $productDiscount = (($product->discount * $product->price) / 100 ) * $Quantity ;
                            $productPriceWithoutDiscount = ($product->price)*$Quantity;           
                            $subtotal = $productPriceWithoutDiscount - $productDiscount;
                            app('App\Http\Controllers\OrderItemController')->update($transaction->user_id,$transaction->order_id,$product->id,$product->price,$Quantity,$subtotal,$product->discount);
                            app('App\Http\Controllers\ProductController')->updateQuantity($product->id,$Quantity);
                        
                        }
                    }
                }   
            }

            Session::forget('cart');

            return redirect()->route('result',$transaction->id)->with('success','پرداخت با موفقیت انجام شد.');
        } catch (InvalidPaymentException|Exception $th) {
            if ($th->getCode() < 0) {
                $transaction->transaction_result = [
                    'message' => $th->getMessage(),
                    'code' => $th->getCode(),
                ];
                $transaction->status = Transaction::STATUS_FAILED;
            
                $transaction->save();

                return view('pages.result')->with(['status'=>$th->getCode(),'failed'=>$th->getMessage()]);
            }
        }
    }

    public function showPay($serialize,$quantity,$totalAmount){
        $address = User_Address::where('user_id','=',Auth::user()->id)->latest()->first();
        $categories = Category::all();
        return view('pages.checkout',compact('serialize','quantity','address','categories','totalAmount'));
    }

    public function index($transactionId){
        $transaction = Transaction::where('id','=',$transactionId)->get()->first();
        return view('pages.result',compact('transaction'));
    }

}
