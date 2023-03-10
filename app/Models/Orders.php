<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'status',
        'img',
        'detail',
        'userid',
        'total',
    ];

    protected $hidden = [
        'id',
    ];

    public function userid() {
        return $this->belongsTo(\App\Models\User::class,'id');
    }

    function order_details()
    {
        return $this->hasMany(Ordersdetails::class,'orderid');
    }

}
