<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChargesController extends Controller
{
    public function charges(){
        return view('charges');
    }
}
