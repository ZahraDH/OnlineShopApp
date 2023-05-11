<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [

        'parent_id', 'category_name'

    ];

    protected $table = 'categories';

    public function categories(){
        return $this->belongsToMany(Category::class);
    }

    public function product(){
        return $this->hasMany(Product::class);
    }
}
