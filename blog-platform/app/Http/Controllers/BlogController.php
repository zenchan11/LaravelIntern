<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blog = Blog::where('approved_status','1')->orderBy('created_at')->paginate(1);
        return view('index',['blogs'=> $blog]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('create');   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
            $blog->approved_status =0;
            $blog->save();

            session()->flash('success','successfully added');

        return redirect('/dashboard');


        }
        else{
            return redirect('/')->with('error','please login to access');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $blogs = Blog::find($id);
        $users = User::find($blogs->user_id);
        return view('show',['blogs'=>$blogs,'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $blogs = Blog::find($id);
        return view('edit',['blogs' => $blogs]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required'
        ]);
        if(Auth::user()->id){
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $auth = Auth::user()->id;

            $blog = Blog::find($id);
            $blog->Blog_title = $request->input('title');
            $blog->description = $request->input('description');
            $blog->image = $imageName;

            $blog->user_id = $auth;
            $blog->save();

            session()->flash('success','successfully added');

        return redirect('/dashboard');


        }
        else{
            return redirect('/')->with('error','please login to access');
        }
        


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $blogs = Blog::find($id);
        if(Auth::User()->id == $blogs->user_id || Auth::User()->role == 1)
        {
            $res = Blog::where('id',$id)->delete();
            session()->flash('deleted','successfully deleted');

        return redirect(route('dashboard'));
    }
    else{

        return redirect()->back()->with('Permission','Not allowed');
    }
    }
}
