<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imports extends Model
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

    public function username() {
        return $this->belongsTo(\App\Models\User::class,'id');
    }
}
