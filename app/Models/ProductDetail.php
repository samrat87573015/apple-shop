<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{

    protected $fillable = [
        'product_id',
        'description',
        'image1',
        'image2',
        'image3',
        'image4',
        'color',
        'size',
    ];

    function product(){
        return $this->belongsTo(Product::class);
    }


    use HasFactory;
}
