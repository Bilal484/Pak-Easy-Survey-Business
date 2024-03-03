<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //

    public function admin()
    {
        return view('front.admin');
    }

    public function customer()
    {
        return view('front.customer');
    }

    public function user()
    {
        return view('front.user');
    }
}
