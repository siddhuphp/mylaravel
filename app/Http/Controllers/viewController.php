<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewController extends Controller
{
    public function example()
    {
        return view('view_example');
    }

    public function example_2()
    {
        return view('view_example_2');
    }
    
}
