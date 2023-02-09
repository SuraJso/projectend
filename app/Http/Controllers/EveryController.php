<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EveryController extends Controller
{
    public function reset()
    {
        return view('auth.passwords.email');
    }
}
