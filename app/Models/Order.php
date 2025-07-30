<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'service',
        'biller',
        'category',
        'package',
        'phone',
        'amount',
    ];
}
