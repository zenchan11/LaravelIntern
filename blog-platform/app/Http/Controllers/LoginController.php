<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blog;

class LoginController extends Controller
{
    //
   public function login() {
    // if (Auth::attempt(['id' => $id, 'password' => $password])) {
      
    //      // Authentication passed...
    //     return redirect()->intended('dashboard');
    //   }
        return view('auth.login');

    }

    public function register(){
        return view('auth.register');

    }

    public function registerUser(Request $request){
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'password' => 'required'
        // ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $res = $user->save();
        if($res)
        {
            return redirect()->back()->with('success','you have registered succesfully');
        }
        else{
            return back()->with('failure','something went wrong');
        }
    }  

    public function LoginUser(Request $request){
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $user = Auth::user();
            $blogs = Blog::all();
    
            return view('auth.dashboard',['user' => $user,'blogs' =>$blogs]);
        
        }

        return redirect()->back()->with('error', 'Invalid login credentials');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
