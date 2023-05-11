<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Address extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'city',
        'address',
        'phone_number',
        'post_code',
        'credit_card'
    ];
    protected $table = 'user_addresses';
    
    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }

    public function shippingInfo(){
        return $this->hasMany(shippingInfo::class);
    }

}
