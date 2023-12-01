<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class ApproveBlogController extends Controller
{
    //
    public function approve(string $id){
        $blogs = Blog::find($id);
        $blogs->approved_status = '1';
        $blogs->save();
    return redirect()->route('admin.dashboard')->with('approved','the post have been approved');
    }
}
