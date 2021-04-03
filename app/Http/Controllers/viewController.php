<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewController extends Controller
{
    public function example()
    {
        return view('view_example');
    }
    
}
