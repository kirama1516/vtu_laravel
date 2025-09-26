<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'service_id',
        'biller_id',
        'category_id',
        'api_code',
        'size',
        'validity',
        'cost',
        'price',
        'status'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function biller()
    {
        return $this->belongsTo(Biller::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
