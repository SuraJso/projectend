<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'detail',
        'img',
        'price',
        'typeproductid',
    ];

    protected $hidden = [
        'id',
    ];

    public function typeproduct() {
        return $this->belongsTo(\App\Models\Typeproduct::class,'typeproductid');
    }
}
