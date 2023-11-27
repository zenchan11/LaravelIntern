<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;


class DashboardController extends Controller
{
    //
    public function dashboard(){
        
        $blogs = Blog::all();
        $users = User::all();
        return view('auth.dashboard',['blogs' => $blogs,'users' => $users]);
    }
}
