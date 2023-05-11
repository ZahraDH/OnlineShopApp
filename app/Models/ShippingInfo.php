<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ShippingInfo extends Model
{
    use HasFactory;
    protected $table = 'shipping_infos';
    protected $fillable = [
        'user_address_id','order_id','status'
    ];

    public function userAddresses(){
        return $this->belongsTo(User_Address::class , 'user_address_id');
    }
}
