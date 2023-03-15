<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stocks extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'count',
        'name',
    ];

    public function product() {
        return $this->belongsTo(\App\Models\Product::class,'productid');
    }
}
