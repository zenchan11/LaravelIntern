<?php
namespace App\Repositories;

use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Models\User;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * 
 */
class BlogRepository implements BlogRepositoryInterface
{
	public function allBlogs(){

		return Blog::where('approved_status','1')->orderBy('created_at')->paginate(2);

	}

	public function storeBlogs($request){
        
        $imageName = $this->changeImageName($request);

        //add specific blogPost
        $blog = new Blog;
        $blog->Blog_title = $request->input('title');
        $blog->description = $request->input('description');
        $blog->image = $imageName;
        $blog->user_id = Auth::user()->id;
        $blog->approved_status =0;
        $blog->save();

    }

    public function getBlogUserId(string $id){
        $blog = Blog::with('user')->find($id);
        if($blog){
            $data =[
                'blogs' => $blog,
                'users' => $blog->user
            ];
            return $data;
        }
    }

    public function changeImageName($request){
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
    return $imageName;
    }

    public function updateBlog($blog,$image){
            $blog->Blog_title = $blog['Blog_title'];
            $blog->description = $blog['description'];
            $blog->image = $image;
            $blog->user_id = Auth::user()->id;
            $blog->save();
    }

    public function storeUser($request){

    }

    public function storeAdminUser($request){
        
    }


}
