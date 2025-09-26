<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'user_id',
        'status'
    ];

    public function billers()
    {
        return $this->hasMany(Biller::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
