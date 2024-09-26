<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerProfile extends Model
{
    use HasFactory;


    protected $fillable = [
        'cus_name',
        'cus_city',
        'cus_state',
        'cus_address',
        'cus_postcode',
        'cus_country',
        'cus_phone',
        'cus_fax',
        'ship_name',
        'ship_city',
        'ship_state',
        'ship_address',
        'ship_postcode',
        'ship_country',
        'ship_phone',
        'ship_fax',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
