<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;


class DashboardController extends Controller
{
    //
    public function Authdashboard(){
        
        $blogs = Blog::where('approved_status',1)->orderBy('created_at')->paginate(1);
        $users = User::all();
        return view('auth.dashboard',['blogs' => $blogs,'users' => $users]);
    }

        public function Admindashboard(){
        
        $blogs = Blog::all();
        $users = User::all();
        return view('admin.dashboard',['blogs' => $blogs,'users' => $users]);
    }
}
