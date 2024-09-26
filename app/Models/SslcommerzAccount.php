<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SslcommerzAccount extends Model
{

    protected $fillable = ['store_id', 'store_password', 'currency', 'sussess_url', 'fail_url', 'cancel_url', 'ipn_url', 'init_url'];


    use HasFactory;
}
