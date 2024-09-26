<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['title', 'short_des', 'price', 'image', 'discount', 'discount_price', 'stock', 'star', 'remark', 'category_id', 'brand_id'];

    function brand(){
        return $this->belongsTo(Brand::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }

    function review()
    {
        return $this->hasMany(ProductReview::class);
    }


    use HasFactory;
}
