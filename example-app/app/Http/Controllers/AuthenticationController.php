<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticationController extends Controller
{
    //
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        $name = $request->input('name');
        $email = $request->input('email');

        DB::table('authentication')->insert(['name'=>$name, 'email' => $email]);
        return view('welcome');
    }
}
