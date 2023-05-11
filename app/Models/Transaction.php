<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;


    const STATUS_SUCCESS = 2;
    const STATUS_PENDING = 1;
    const STATUS_FAILED = 0;

    protected $fillable = [
        'user_id',
        'order_id',
        'payment_id',
        'paid',
        'status',
        'invoice_details',
        'transaction_result',
        'transaction_id'
    ];

   

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
     
    public function setInvoiceDetailsAttribute($value){
        $this->attributes['invoice_details'] = serialize($value);
    }

    public function getInvoiceDetailsAttribute(){
        return unserialize($this->attributes['invoice_details']);
    }

    public function setTransactionResultAttribute($value){
        $this->attributes['transaction_result'] = serialize($value);
    }

    public function getTransactionResultAttribute(){
        return unserialize($this->attributes['transaction_result']);
    }
}
