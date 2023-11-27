<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        return redirect('/admin/dashboard')->with('success','login');

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
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        if(Auth::user()){
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $auth = Auth::user()->id;

        $blog = new Blog;
        $blog->Blog_title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->image = $imageName;

        $blog->user_id = $auth;
        $blog->save();

        session()->flash('success','successfully added');

        return redirect('/dashboard');


        }
        else{
            return redirect('/')->with('error','pleas login to access');
        }
        
    }

    


    public function index()
    {
        //
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
