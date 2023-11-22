<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    //
        public function create(): View
    {
        return view('ValidationError');
    }
 
    /**
     * Store a new blog post.
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $validated = $request->validate([
    //         'title' => 'required|unique:posts|max:255',
    //         'body' => 'required',
    //         'name' => 'required|string|max:255',
    //     ]);

    //     if ($validated->fails()) {
    //         return redirect('ValidationError')
    //                     ->withErrors($validator)
    //                     ->withInput();
    //     }     
    //     // The blog post is valid...
     
    //     return redirect('/post');
    // }

     public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
            'name' => 'required|string|max:255',
            'email'=>'required|email'
        ]);
     
        return redirect('/post');
    }
}
