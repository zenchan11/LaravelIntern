<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function dashboard(){
        if(Auth::check())
        {
            return view('auth.dashboard');
        }
    }
}
