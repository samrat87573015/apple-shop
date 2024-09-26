<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policie extends Model
{
    protected $fillable = ['type', 'content'];

    use HasFactory;
}
