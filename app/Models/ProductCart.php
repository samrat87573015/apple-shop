<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCart extends Model
{

    protected $fillable = [
        'product_id',
        'user_id',
        'quantity',
        'color',
        'size',
        'price',
    ];

    public function product(){

        return $this->belongsTo(Product::class);
    }

    use HasFactory;
}
