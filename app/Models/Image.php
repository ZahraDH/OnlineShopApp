<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Image extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;

    protected $table = 'images';
    
    protected $fillable = [

        'product_id'

    ];
    
    public function product(){
        return $this->belongsTo(Product::class);
    }
}

