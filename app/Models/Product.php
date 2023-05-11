<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model 
{
    use HasFactory;
    protected $fillable = [

        'category_id', 'user_id','name','description','price','sku','weight','brand','quantity','discount','buyCount','brand_id'

    ];

    public function showImagePath(){
        return $this->hasMany(Image::class);
    }

    public function orderitem(){
        return $this->hasMany(OrderItem::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
