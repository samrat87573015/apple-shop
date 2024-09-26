<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSlider extends Model
{

    protected $fillable = ['slider_title', 'slider_desc', 'slider_image'];

    use HasFactory;

}
