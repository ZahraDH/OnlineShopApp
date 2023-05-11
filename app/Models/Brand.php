<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_name','trade_id','national_number','city','address','phone_number','post_code','email','status','code'
    ];

    public function products(){
        return $this->hasMany(Product::class);
    }
}
