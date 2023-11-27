<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(){

        return view('admin.login');
    }

    public function loginUser(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

    if(Auth::attempt($credentials)){
        return redirect(route('admin.dashboard'))->with('success','login');

    }
    else{
        echo "nahh";

    }
    }

    public function register(){

        return view('admin.register');
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 1;
        $res = $user->save();
        if($res)
        {
            return redirect('/')->with('success','you have registered succesfully');
        }
        else{
            return back()->with('failure','something went wrong');
        }
        echo "works";
        
    }

    public function approve(string $id){
        $blogs = Blog::find($id);
        $blogs->approved_status = '1';
        $blogs->save();
        return redirect()->route('admin.dashboard')->with('approved','the post have been approved');
    }

    public function show(string $id){
        $blogs = Blog::find($id);
        $users = User::find($blogs->user_id);
        return view('admin.show',['blogs'=>$blogs,'users' => $users]);
    }

    public function index()
    {
        //
        return view('admin.login');
    }

    public function logout(){
        session::flush();
        Auth::logout();
        return redirect('/');
    }


}
