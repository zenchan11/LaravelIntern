<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterAdminRequest;
use App\Http\Requests\LoginAdminRequest;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(){
        return view('admin.login');
    }

    public function loginUser(LoginAdminRequest $request){

        if(Auth::attempt($credentials)){
            return redirect()->route('admin.dashboard')->with('success','login');

        }
        else{
            echo "nahh";

        }
    }

    public function register(){
        return view('admin.register');
    }

    public function registerUser(RegisterAdminRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = 1;
        $res = $user->save();
        if($res)
        {
            return redirect()->route('blog')->with('success','you have registered succesfully');
        }
        else{
            return back()->with('failure','something went wrong');
        }
        
    }



    public function show(string $id){
        $blogs = Blog::find($id);
        $users = User::find($blogs->user_id);
        return view('admin.show',compact('blogs','users'));//['blogs'=>$blogs,'users' => $users]);
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
