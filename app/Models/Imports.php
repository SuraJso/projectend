<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imports extends Model
{
    use HasFactory;

    public function username() {
        return $this->belongsTo(\App\Models\User::class,'id');
    }
}
