<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typeproduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
    ];

    protected $hidden = [
        'id',
    ];

    public function product() {
        return $this->hasMany(\App\Models\Product::class,'id');
    }
}
