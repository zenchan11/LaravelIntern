<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Blog;

class TrashController extends Controller
{
    //
    public function trash(){
        $onlyTrashed = Blog::onlyTrashed()->get();
        return view('trash.trash',compact('onlyTrashed'));    
    }

    public function restore(string $id){
        $trashedBlog = Blog::onlyTrashed()->find($id);
        $trashedBlog->restore();
    return redirect()->route('trash')->with('restored','successfully restored');

    }
    public function premeanantlyDelete(string $id){
        $trashedBlog = Blog::onlyTrashed()->find($id);
        $image = $trashedBlog['image'];
        $filePath = public_path('images/'.$image);

        //delete the file from public folder
        if(File::exists($filePath)){
            File::delete($filePath);
        }
        $trashedBlog->forceDelete();
    return redirect()->route('trash')->with('premeanantlyDeleted','ForeverDeleted');
    }
}

