<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Traits\ApiResponseTrait;
use App\Http\Requests\StorePostRequest;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use Illuminate\Http\RedirectResponse;


class BlogController extends Controller
{
    // for json responses
    use ApiResponseTrait;
    private $blogRepository;

    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        //
        // $blogs = Blog::where('approved_status','1')->orderBy('created_at')->paginate(1);
        $blogs = $this->blogRepository->allBlogs();
        return view('index',compact('blogs'));
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
    public function store(StorePostRequest $request): RedirectResponse
    {

        if(Auth::user()){
            $this->blogRepository->storeBlogs($request);
            session()->flash('success','successfully updated');
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('blog')->with('error','please login to access');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $data = $this->blogRepository->getBlogUserId($id);
        return view('show',compact('data'));
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
    public function update(StorePostRequest $request, string $id)
    {

        if(Auth::User()->id == Blog::find($id)->user_id || Auth::User()->role == 1){
            $blog = Blog::find($id);
            $image = $this->blogRepository->changeImageName($request);
            $this->blogRepository->updateBlog($blog,$image);

            session()->flash('success','successfully added');

        return redirect()->route('dashboard');


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
        if(Auth::User()->id == Blog::find($id)->user_id || Auth::User()->role == 1)
        {
            $res = Blog::where('id',$id)->delete();
            session()->flash('deleted','successfully deleted');

        return redirect(Auth::User()->role ==1 ? route('admin.dashboard') : route('dashboard'));
;

        }
        else{

            return redirect()->back()->with('Permission','Not allowed');
        }
    }
}
