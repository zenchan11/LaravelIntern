<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Notifications\BlogApproved;
use Illuminate\Support\Facades\Notification;
use App\Jobs\ApproveBlogJob;

class ApproveBlogController extends Controller
{
    //
    public function approve(string $id){
        $blogs = Blog::with('user')->where('id',$id)->first();
        $blogs->approved_status = '1';
        $blogs->save();
        $users = $blogs->user;
        ApproveBlogJob::dispatch($blogs,$users);
        
    return redirect()->route('admin.dashboard')->with('approved','the post have been approved');
    }
}
