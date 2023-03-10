<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordersdetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'orderid',
        'productid',
        'amount',
        'price',
    ];

    public function product() {
        return $this->belongsTo(\App\Models\Product::class,'productid');
    }
}
